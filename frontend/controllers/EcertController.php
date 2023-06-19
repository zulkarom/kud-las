<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Rider;
use frontend\models\DownloadForm;
use backend\models\CertParticipation;
use backend\models\CertAchievement;
use backend\models\Participant;
use backend\models\KejohananCert;
use frontend\models\EcertSearch;

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
        $model = new EcertSearch();
        $result = false;
        if(array_key_exists('EcertSearch', $params)){
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
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $download = new DownloadForm();
        
        $model = $this->findModel($id);
        
        if ($download->load(Yii::$app->request->post())) {
            if($model->kejohanan->cert_publish_at && strtotime($model->kejohanan->cert_publish_at) <= time()){
                $jenis = Yii::$app->request->post('jenis');
       
                if($download->nric == $model->rider->nric && $model->register_status == 100){
                    if($jenis == 1){
                        if($model->kejohanan->file_class){
                            $pdf = new $model->file_class;
                            $pdf->frontend = true;
                            $pdf->model = $model;
                            $pdf->generatePdf();
                            exit;
                        }else{
                            $pdf = new CertParticipation();
                            $pdf->frontend = true;
                            $pdf->model = $model;
                            $pdf->generatePdf();
                            exit;
                        }


                    }else if($jenis == 2 && $model->cert_achive == 1){
                        $pdf = new CertAchievement();
                        $cert = KejohananCert::findOne(['kejohanan_id' => $model->kejohanan_id, 'category_id' => $model->category_id]);
                        if($cert){
                            if($cert->file_class){
                                $pdf = new $cert->file_class;
                                $pdf->cert = $cert;
                                $pdf->frontend = true;
                                $pdf->model = $model;
                                $pdf->generatePdf();
                                exit;
                            }else{
                                $pdf = new CertAchievement();
                                $pdf->cert = $cert;
                                $pdf->frontend = true;
                                $pdf->model = $model;
                                $pdf->generatePdf();
                                exit;
                            }
                        }else{
                            Yii::$app->session->addFlash('error', "Sijil belum sedia (c)");
                            return $this->refresh();
                        }


                        


                        
                    }else{
                        Yii::$app->session->addFlash('error', "Sijil tidak dijumpai");
                        return $this->refresh();
                    }
    
                }else{
                    Yii::$app->session->addFlash('error', "Sijil tidak dijumpai");
                    return $this->refresh();
                }
            }else{
                Yii::$app->session->addFlash('error', "Sijil belum sedia (t)");
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
        if (($model = Participant::findOne(['id' => $id])) !== null) {
            return $model;
        }
        
        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

}
