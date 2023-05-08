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

/**
 * Site controller
 */
class EcertController extends Controller
{
    public $layout = 'ecert';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        
        $params = Yii::$app->request->queryParams;
        $dataProvider = null;
        $model = new RiderSearch();
        $result = false;
        if(array_key_exists('RiderSearch', $params)){
            $result = true;
            
            $dataProvider = $model->search($this->request->queryParams);
        }
        
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'result' => $result
        ]);
    }
    
    /**
     * Displays a single Rider model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $download = new DownloadForm();
        
        $model = $this->findModel($id);
        
        if ($download->load(Yii::$app->request->post())) {
            $jenis = Yii::$app->request->post('jenis');
       
            if($download->nric == $model->nric && $model->status == 10){
                if($jenis == 1){
                    $pdf = new CertParticipation();
                    $pdf->frontend = true;
                    $pdf->model = $model;
                    $pdf->generatePdf();
                    exit;
                }else if($jenis == 2 && $model->cert_achive == 1){
                    $pdf = new CertAchievement();
                    $pdf->frontend = true;
                    $pdf->model = $model;
                    $pdf->generatePdf();
                    exit;
                }else{
                    Yii::$app->session->addFlash('error', "Sijil tidak dijumpai");
                    return $this->refresh();
                }

            }else{
                Yii::$app->session->addFlash('error', "Sijil tidak dijumpai");
                return $this->refresh();
            }
        }
        
        
        return $this->render('view', [
            'model' => $model ,
            'download' => $download
        ]);
    }
    
    
    /**
     * Finds the Rider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Rider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rider::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

}
