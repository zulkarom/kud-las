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
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
       
            if($download->nric == $model->nric){
                if($jenis == 1){
                    $pdf = new CertParticipation();
                    $pdf->model = $model;
                    $pdf->generatePdf();
                    exit;
                }else if($jenis == 2 && $model->cert_achive == 1){
                    $pdf = new CertAchievement();
                    $pdf->model = $model;
                    $pdf->generatePdf();
                    exit;
                }

            }else{
                Yii::$app->session->addFlash('error', "No. Kad Pengenalan tidak sah");
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
