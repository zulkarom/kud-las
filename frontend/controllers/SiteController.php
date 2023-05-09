<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Rider;
use backend\models\Competition;
use backend\models\Horse;
use backend\models\Kejohanan;
use frontend\models\HorseSearch;
use frontend\models\S1Form;
use yii\db\Expression;

/**
 * Site controller
 */
class SiteController extends Controller
{


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($n=false)
    {
        $model = new S1Form;
        if($n){
            $model->nric = $n;
        }

        if ($model->load(Yii::$app->request->post())) {
            $nric = $model->nric;
            $kejohanan = Kejohanan::findOne(['is_active' => 1]);
            $ada = Competition::find()->alias('a')
            ->joinWith(['rider r'])
            ->where(['r.nric' => $nric, 'a.kejohanan_id' => $kejohanan->id])
            ->one();
            if($ada){
                return $this->redirect(['s2edit', 'f' => $ada->id]);

            }else{
                //cari rider dulu
                $rider = Rider::findOne(['nric' => $nric]);
                if($rider){
                    //klu ada create competition terus - edit rider
                }else{
                    return $this->redirect(['s2new', 'n' => $nric]);
                    //redirect to step 2 - create new rider
                }
  
                
            }
            die();
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionS2new($n, $f = false){
        $model = new Rider();
        $model->nric = $n;
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        if ($model->load(Yii::$app->request->post())) {
            $model->rider_name = strtoupper($model->rider_name);
            if($model->save()){
                //buat id pendaftaran
                $daftar = new Competition();
                $daftar->kejohanan_id = $kejohanan->id;
                $daftar->rider_id = $model->id;
                if($daftar->save()){
                    return $this->redirect(['s3kuda-search', 'f' => $daftar->id]);
                }
                //redirect ke maklumat kuda
            }
        }


        return $this->render('s2new', [
            'model' => $model,
        ]);
    }

    public function actionS2edit($f){
        $daftar = $this->findCompetition($f);
        $model = Rider::findOne($daftar->rider_id);
        //$kejohanan = Kejohanan::findOne(['is_active' => 1]);
        if ($model->load(Yii::$app->request->post())) {
            $model->rider_name = strtoupper($model->rider_name);
            if($model->save()){

                $daftar->rider_address = $model->address;
                $daftar->rider_phone = $model->phone;
                $daftar->rider_kelab = $model->kelab;

                if($daftar->save()){
                    if($daftar->horse_id){
                        return $this->redirect(['s3kuda-view', 'f' => $f]);
                    }else{
                        return $this->redirect(['s3kuda-search', 'f' => $daftar->id]);
                    }
                    
                }

            }
        }

        return $this->render('s2new', [
            'model' => $model,
            'daftar' => $daftar
        ]);
    }

    public function actionTest(){
        $list = Horse::find()->all();
        foreach($list as $h){
            if(!$h->horse_code){
                if($h->horse_name){
                    $fr= strtoupper(substr($h->horse_name, 0, 1));
                    $id = $h->id;
                    $code = $fr.$id;
                    $h->horse_code = $code;
                    if(!$h->save()){
                        print_r($h->getErrors());
                    }
                }
                echo $h->horse_code;
                echo '<br />';
            }
        }
    }

    public function actionS3kudaSearch($f, $h = false){
        $daftar = $this->findCompetition($f);
        if($h){
            $kuda = $this->findHorse($h);
            $daftar->horse_id = $h;
            if($daftar->save()){
                return $this->redirect(['s3kuda-view', 'f' => $f]);
            }

        }
        
        $params = Yii::$app->request->queryParams;
        $dataProvider = null;
        $model = new HorseSearch();
        $result = false;
        if(array_key_exists('HorseSearch', $params)){
            $result = true;
            
            $dataProvider = $model->search($this->request->queryParams);
        }
        
        return $this->render('s3kudaSearch', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'result' => $result,
            'daftar' => $daftar
        ]);
    }

    public function actionS3kuda($f){
        $model = new Horse();
       // $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $daftar = $this->findCompetition($f);

        if ($model->load(Yii::$app->request->post())) {
            if($model->eam_id == ''){
                $model->eam_id = null;
            }
            
            if($model->save()){
                //generate code
                if($model->horse_name){
                    $fr= strtoupper(substr($model->horse_name, 0, 1));
                    $id = $model->id;
                    $code = $fr.$id;
                    $model->horse_code = $code;
                    $model->save();
                }
                $daftar->horse_id = $model->id;
                if($daftar->save()){
                    return $this->redirect(['s4competition', 'f' => $f]);
                }
            }
        }

        

        return $this->render('s3kuda', [
            'model' => $model,
            'daftar' => $daftar
        ]);
    }

    public function actionS3kudaView($f, $b = false){
        $daftar = $this->findCompetition($f);
        if($b){
            $daftar->horse_id = null;
            if($daftar->save()){
                return $this->redirect(['s3kuda-search', 'f' => $f]);
            }
        }
        $model = $this->findHorse($daftar->horse_id);
       // $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        

        if ($model->load(Yii::$app->request->post())) {
            if($model->eam_id == ''){
                $model->eam_id = null;
            }
            if($model->save()){
                return $this->redirect(['s4competition', 'f' => $f]);
            }
            

        }

        

        return $this->render('s3kudaView', [
            'model' => $model,
            'daftar' => $daftar
        ]);
    }

    public function actionS4competition($f){
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $daftar = $this->findCompetition($f);
        $daftar->scenario = 'kejohanan';

        if ($daftar->load(Yii::$app->request->post())) {
            $daftar->register_at = new Expression('NOW()');
            $daftar->register_status = 100;
            if($daftar->save()){
                return $this->redirect(['thankyou', 'f' => $f]);
            }
        }

        return $this->render('s4competition', [
            'model' => $daftar,
        ]);
    }

    public function actionThankyou($f){
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $daftar = $this->findCompetition($f);
        if($daftar->register_status < 100){
            return $this->redirect(['s4competition', 'f' => $f]);
        }


        return $this->render('thankyou', [
            'model' => $daftar,
        ]);
    }


    protected function findCompetition($id)
    {
        if (($model = Competition::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }
   
    protected function findModel($id)
    {
        if (($model = Rider::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    protected function findHorse($id)
    {
        if (($model = Horse::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

}
