<?php

namespace backend\controllers;

use backend\models\Category;
use backend\models\Participant;
use backend\models\Kejohanan;
use backend\models\Vest;
use backend\models\VestSearch;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * VestController implements the CRUD actions for Vest model.
 */
class VestController extends Controller
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
     * Lists all Vest models.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $status = 1;
        if(Yii::$app->getRequest()->getQueryParam('VestSearch')){
            $form = Yii::$app->getRequest()->getQueryParam('VestSearch');
            $status = isset($form['status']) ? $form['status'] : null;
        }

        $searchModel = new VestSearch();
        $searchModel->status = $status;
        $dataProvider = $searchModel->search($this->request->queryParams);
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest(){
       /*   for($i=101;$i<=160;$i++){
            $vest = new Vest();
            $vest->vest_no = $i;
            $vest->color = 'Baby Blue';
            $vest->status = 1;
            if($vest->save()){
                echo 'vest no ' . $vest->vest_no . ' created <br />';
            }
            
        }

        exit; */
    }

    public function actionAssign()
    {
        $list = Category::find()->alias('a')
        ->select(new Expression('a.*, SUM(IF(c.vest_id IS NOT NULL,1,0)) as count_assigned, SUM(IF(c.vest_id IS NULL,1,0)) as count_unassigned'))
        ->joinWith(['competitions c'])
        ->where(['a.is_enabled' => 1, 'register_status' => 100])
        ->groupBy('a.id')
        ->all();
  

        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        if($kejohanan){
            return $this->render('assign', [
                'list' => $list,
                'kejohanan' => $kejohanan
            ]);
        }else{
            Yii::$app->session->addFlash('success', "Tiada Kejohanan aktif");
            return $this->redirect(['index']);
        }
        
    }

    public function actionReassignAll($cat){
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $category = Category::findOne($cat);
        if($kejohanan && $category){

            //reset vest data
            Participant::updateAll(['vest_id' => null]);

            //reset all kejohanan
            Participant::updateAll(['participant_vest_id' => null],['kejohanan_id' => $kejohanan->id,'category_id' => $category->id]);

            //assumption semua unassgined
            $unassigned = Participant::find()
            ->where(['kejohanan_id' => $kejohanan->id, 'category_id' => $category->id])
            ->all();

            $cat_color = $category->color;

            $vest = Vest::find()->alias('v')
            ->where(['color' => $cat_color, 'v.status' => 1])
            ->orderBy('vest_no ASC')
            ->all();

            $vest_arr = [];
                if($vest) {
                    foreach($vest as $v) {
                        $vest_arr[] = $v->id;
                    }

                    $success = 0;
                    if($unassigned){
                        
                        foreach($unassigned as $i => $ua){
                            $ua->vest_id = $vest_arr[$i];
                            $ua->participant_vest_id = $vest_arr[$i];
                            if($ua->save()){
                                $success++;
                            }
                        }
                    }
                }

        }

        Yii::$app->session->addFlash('success', $success . " Vest(s) has been successfully re-assigned.");
        return $this->redirect(['assign']);

    }

    public function actionResetAll($cat){
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $category = Category::findOne($cat);
        if($kejohanan && $category){
            //reset all 
            Participant::updateAll(['vest_id' => null, 'participant_vest_id' => null],['kejohanan_id' => $kejohanan->id,'category_id' => $category->id]);

        }

        Yii::$app->session->addFlash('success', "Reset done.");
        return $this->redirect(['assign']);

    }


    public function actionRunUnassigned($cat){
        //get list of unassigned vest
        //get list of unassigned competition
        //list assigned
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        $category = Category::findOne($cat);
        if($kejohanan && $category){
            $assigned = Participant::find()
            ->where(['kejohanan_id' => $kejohanan->id]) // semua category pun ok
            ->andWhere(new Expression('vest_id IS NOT NULL'))
            ->all();

            $unassigned = Participant::find()
            ->where(['kejohanan_id' => $kejohanan->id, 'category_id' => $category->id])
            ->andWhere(new Expression('vest_id IS NULL'))
            ->all();

            $assigned_arr = ArrayHelper::map($assigned, 'id', 'vest_id');

            $cat_color = $category->color;

            $vest = Vest::find()->alias('v')
            ->leftJoin('participant c','c.vest_id = v.id')
            ->where(['color' => $cat_color, 'v.status' => 1])
            ->andWhere(['NOT IN', 'v.id', $assigned_arr])
            ->orderBy('vest_no ASC')
            ->all();
            $success = 0;
            $vest_arr = [];
            if($vest){
                foreach($vest as $v){
                    $vest_arr[] = $v->id;
                }
                if($unassigned){
                    foreach($unassigned as $i => $ua){
                        $ua->vest_id = $vest_arr[$i];
                        $ua->participant_vest_id = $vest_arr[$i];
                        if($ua->save()){
                            $success++;
                        }
                    }
                }
            }else{
                Yii::$app->session->addFlash('error', "Tiada vest");
            }
        }
        Yii::$app->session->addFlash('success', $success . " Vest(s) has been successfully assigned.");
        return $this->redirect(['assign']);
    }

    /**
     * Displays a single Vest model.
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

    /**
     * Creates a new Vest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Vest();

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
     * Updates an existing Vest model.
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

    /**
     * Deletes an existing Vest model.
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

    /**
     * Finds the Vest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Vest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
