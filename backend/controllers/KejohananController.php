<?php

namespace backend\controllers;

use Yii;
use backend\models\Kejohanan;
use backend\models\KejohananCert;
use backend\models\KejohananSearch;
use common\models\EcertFile;
use common\models\Upload;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * KejohananController implements the CRUD actions for Kejohanan model.
 */
class KejohananController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
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
    }

    /**
     * Lists all Kejohanan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KejohananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kejohanan model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $certs = $model->certs;
        return $this->render('view', [
            'model' => $model,
            'certs' => $certs
        ]);
    }

    /**
     * Creates a new Kejohanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kejohanan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->is_active = 0;
                $model->cert_participant = $this->uploadFile($model);
                if($model->save()){
                    Yii::$app->session->addFlash('success', "Kejohanan created.");
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    $model->flashError();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kejohanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->cert_participant = $this->uploadFile($model);
            if($model->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->redirect(['view', 'id' => $model->id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionMakeActive($id)
    {
        Kejohanan::updateAll(['is_active' => 0]);
        $model = $this->findModel($id);
        $model->is_active = 1; 
        if($model->save()){
            Yii::$app->session->addFlash('success', $model->name. " is active");
        }
        return $this->redirect(['index']);
        
    }

    /**
     * Deletes an existing Kejohanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
            Yii::$app->session->addFlash('success', "Kejohanan Deleted");
            return $this->redirect(['index']);
        } catch(\yii\db\IntegrityException $e) {
            throw new \yii\web\ForbiddenHttpException('Could not delete this kejohanan. Other records depend on this data.');
        }
    }

    /**
     * Finds the Kejohanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Kejohanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kejohanan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCert($id)
    {
        if (($model = KejohananCert::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function uploadFile($model){
        $inst_property = 'cert_instance';
        $attr_db = 'cert_participant';
        $f = 'participant';
        
        $instance = UploadedFile::getInstance($model, $inst_property);
        if($instance){
            if($model->isNewRecord){
                $path = time();
            }else{
                //delete existing file
                $old_path = Yii::getAlias('@ecertdir/'.$model->id.'/' . $model->$attr_db);
                if (is_file($old_path)) {
                    unlink($old_path);
                }
                $path =  $model->id;
            }
            
            
            $directory = Yii::getAlias('@ecertdir/' . $path. '/');
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }

            $ext = $instance->extension;
            $fileName = $f.'.' . $ext;
            $filePath = $directory . $fileName;
                if ($instance->saveAs($filePath)) {
                    return $path . '/' . $fileName;
                }
        }

        if($model->isNewRecord){
            return '';
        }else{
            return $model->$attr_db;
        }
        
    }

    public function actionDownloadFile($id){
        $model = $this->findModel($id);
        //$filename = 'file';
        EcertFile::download($model, 'cert_participant', 'file');
    }

    public function actionDownloadCertFile($id){
        $model = $this->findCert($id);
        //$filename = 'file';
        EcertFile::download($model, 'certificate_file', 'file');
    }

    public function actionCertAdd($id){
        $model = $this->findModel($id);
        $cert = new KejohananCert();
        $cert->kejohanan_id = $model->id;

        if ($this->request->isPost && $cert->load($this->request->post())) {
            $cert->uploadFile();
            if($cert->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->redirect(['view', 'id' => $model->id]);
            } else{
                print_r($cert->getErrors());
                die();
            } 
            
        }

        return $this->render('cert-add', [
            'model' => $cert,
        ]);
    }

    public function actionCertUpdate($id){
        $model = $this->findCert($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->uploadFile();
            if($model->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->redirect(['view', 'id' => $model->kejohanan_id]);
            }/* else{
                print_r($cert->getErrors());
                die();
            } */
            
        }

        return $this->render('cert-update', [
            'model' => $model,
        ]);
    }

    public function actionCertDelete($id)
    {
        try {
            $model = $this->findCert($id);
            $path = $model->certificate_file;
            $model->delete();
            $old_path = Yii::getAlias('@ecertdir/' . $path);
                if (is_file($old_path)) {
                    unlink($old_path);
                }

            Yii::$app->session->addFlash('success', "Cert Deleted");
            return $this->redirect(['view', 'id' => $model->kejohanan_id]);
        } catch(\yii\db\IntegrityException $e) {
            throw new \yii\web\ForbiddenHttpException('Could not delete this item. Other records depend on this data.');
        }
    }
}
