<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Rider;
use frontend\models\RiderSearch;
use frontend\models\DownloadForm;
use backend\models\CertParticipation;
use backend\models\CertAchievement;
use backend\models\Competition;
use backend\models\Horse;
use backend\models\Kejohanan;
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
    public function actionIndex()
    {
        $model = new S1Form;

        if ($model->load(Yii::$app->request->post())) {
            $nric = $model->nric;
            $kejohanan = Kejohanan::findOne(['is_active' => 1]);
            $ada = Competition::find()->alias('a')
            ->joinWith(['rider r'])
            ->where(['r.nric' => $nric, 'a.kejohanan_id' => $kejohanan->id])
            ->one();
            if($ada){
                echo 'ada';//bagi preview

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
            if($model->save()){
                //buat id pendaftaran
                $daftar = new Competition();
                $daftar->kejohanan_id = $kejohanan->id;
                $daftar->rider_id = $model->id;
                if($daftar->save()){
                    return $this->redirect(['s3kuda']);
                }
                //redirect ke maklumat kuda
            }
        }


        return $this->render('s2new', [
            'model' => $model,
        ]);
    }

    public function actionS2edit($f){
        $model = new Rider();
        $daftar = $this->findCompetition($f);
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                if($daftar->save()){
                    return $this->redirect(['s3kuda']);
                }
                //redirect ke maklumat kuda
            }
        }

        return $this->render('s2new', [
            'model' => $model,
            'daftar' => $daftar
        ]);
    }

    public function actionS3kuda($f){
        $model = new Horse();
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $daftar = $this->findCompetition($f);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
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

    public function actionS4competition($f){
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $daftar = $this->findCompetition($f);
        $daftar->scenario = 'kejohanan';

        if ($daftar->load(Yii::$app->request->post())) {
            $daftar->register_at = new Expression('NOW()');
            $daftar->register_status = 100;
            if($daftar->save()){
                return $this->redirect(['thankyou']);
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

}
