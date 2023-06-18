<?php

namespace backend\controllers;

use backend\models\AchievementSearch;
use backend\models\CertAchievement;
use backend\models\CertParticipation;
use Yii;
use backend\models\Competition;
use backend\models\CompetitionPrint;
use backend\models\CompetitionSearch;
use backend\models\Kejohanan;
use backend\models\KejohananCert;
use backend\models\Vest;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * CompetitionController implements the CRUD actions for Competition model.
 */
class CompetitionController extends Controller
{
    /**
     * @inheritDoc
     */
        

    /* public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    } */

    /**
     * Lists all Competition models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $status = 100;
        if(Yii::$app->getRequest()->getQueryParam('CompetitionSearch')){
            $form = Yii::$app->getRequest()->getQueryParam('CompetitionSearch');
            $status = isset($form['register_status']) ? $form['register_status'] : null;
        }
        $searchModel = new CompetitionSearch();
        $searchModel->register_status = $status;
        
        $com = Kejohanan::findOne(['is_active' => 1]);
        if($com){
            $searchModel->kejohanan_id = $com->id;
        }
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAchievement()
    {
        $searchModel = new AchievementSearch();
        
        $com = Kejohanan::findOne(['is_active' => 1]);
        if($com){
            $searchModel->kejohanan_id = $com->id;
        }
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('achievement', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAchievementChange(){
        //Yii::$app->controller->enableCsrfValidation = false;
        $post = $this->request->post();
        $id = $post['competition'];
        $status = $post['astatus'] == 1 ? 1 : 0;

        $comp = Competition::findOne($id);
        if($comp){
            $comp->cert_achive = $status;
            if($comp->save()){
                return 1;
            }
        }
        //print_r($post);
        return 0;
    }

    public function actionAchievementLaju(){
        
        //Yii::$app->controller->enableCsrfValidation = false;
        $post = $this->request->post();
        $id = $post['competition'];
        $laju = $post['kelajuan'];

        $comp = Competition::findOne($id);
        if($comp){
            $comp->hadlaju = $laju;
            if($comp->save()){
                return 1;
            }
        }
        //print_r($post);
        return 0;
    }

    public function actionAchievementCert($id){
        $model = $this->findModel($id);
        if($model->cert_achive == 1 && $model->register_status == 100){
            $pdf = new CertAchievement();
            $cert = KejohananCert::findOne(['kejohanan_id' => $model->kejohanan_id, 'category_id' => $model->category_id]);
            if($cert){
                $pdf->cert = $cert;
                $pdf->frontend = false;
                $pdf->model = $model;
                $pdf->generatePdf();
                exit;
            }
        }
        echo 'Tiada Sijil';
    }

    public function actionParticipantCert($id){
        $model = $this->findModel($id);
        if($model->register_status == 100){
            $pdf = new CertParticipation();
                $pdf->frontend = false;
                $pdf->model = $model;
                $pdf->generatePdf();
                exit;
        }
        echo 'Tiada Sijil';
    }

    public function actionDeleteAll($id){
        $com = $this->findModel($id);
        $rider = $com->rider;
        $kuda = $com->horse;
        if($com->delete()){
            Yii::$app->session->addFlash('success', "Pendaftaran deleted");
        }
        
        if($rider){
            try {
                $rider->delete();
               
                Yii::$app->session->addFlash('success', "Rider Deleted");
            } catch(\yii\db\IntegrityException $e) {
                
                Yii::$app->session->addFlash('error', "Rider telah didaftar dlm pendaftaran lain");
            }
        }

        

        if($kuda){
            try {
                $kuda->delete();
               
                Yii::$app->session->addFlash('success', "Horse Deleted");
            } catch(\yii\db\IntegrityException $e) {
                
                Yii::$app->session->addFlash('error', "Kuda telah didaftar dlm pendaftaran lain");
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Displays a single Competition model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionReturnForm($id){
        $model = $this->findModel($id);
        $model->register_status = 0;
        if($model->save()){
            Yii::$app->session->addFlash('success', "The form has been returned");
        }
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Creates a new Competition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Competition();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Competition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    

    public function actionUpdateVest($id)
    {
        $model = $this->findModel($id);
        $vest_list = [];
        $category = $model->category;
        if($category){
            $cat_color = $category->color;
        
            $assigned = Competition::find()->alias('c')
            ->select('v.id, v.vest_no')
                ->leftJoin('vest v', 'v.id = c.vest_id')
                ->where(['kejohanan_id' => $model->kejohanan_id, 'category_id' => $model->category_id])
                ->andWhere(new Expression('vest_id IS NOT NULL'))
                ->all();
    
            $assigned_arr = ArrayHelper::map($assigned, 'id', 'vest_no');
    
            if($model->vest_id) {
                unset($assigned_arr[$model->vest_id]);
            }
           /*  echo $model->vest_id;
           print_r($assigned_arr);die(); */
    
            $vest = Vest::find()->alias('v')
                ->select('v.id, v.vest_no')
                ->leftJoin('competition c','c.vest_id = v.id')
                ->where(['color' => $cat_color, 'v.status' => 1])
                ->andWhere(['NOT IN', 'v.id', $assigned_arr])
                ->orderBy('vest_no ASC')
                ->all();
    
            $vest_list = ArrayHelper::map($vest, 'id', 'vest_no');
        }
        
        

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', "Data Updated");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $rider = $model->rider;
        if ($this->request->isPost && $rider->load($this->request->post()) && $rider->save()) {
            //update dlm competition jgk
            Yii::$app->session->addFlash('success', "Rider Data Updated");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $horse = $model->horse;
        //$horse->horse_dob = 'werwerw';
        if ($this->request->isPost && $horse->load($this->request->post()) && $horse->save()) {
            //update dlm competition jgk
            Yii::$app->session->addFlash('success', "Horse Data Updated");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update-vest', [
            'model' => $model,
            'rider' => $rider,
            'horse' => $horse,
            'vest_list' => $vest_list
        ]);
    }

    /**
     * Deletes an existing Competition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDownloadPdf($id){
        $daftar = $this->findCompetition($id);
        $pdf = new CompetitionPrint;
        $pdf->model = $daftar;
        $pdf->generatePdf();
        exit;

    }

    public function actionDownloadSelected(){
        if (Yii::$app->request->post('selection') ){
            $ids = Yii::$app->request->post('selection');
            
            $pdf = new CompetitionPrint;
            $pdf->models = Competition::find()->where(['id' => $ids])->all();
            $pdf->model = null;
            $pdf->generatePdf();
            exit;
            
        }
            
        Yii::$app->session->addFlash('error', "No item selected");
        return $this->redirect(['index']);
    }

    protected function findCompetition($id)
    {
        if (($model = Competition::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Competition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Competition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Competition::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
