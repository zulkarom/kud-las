<?php

namespace  backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use backend\modules\admin\models\LoginAsSearch;
use common\models\User;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class LoginasController extends Controller
{
    /**
     * @inheritdoc
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
	
	public function actionIndex()
	{
		$searchModel = new LoginAsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}
	
	public function actionLoginAsUser($id){
		$user = User::findIdentity($id);
		$original = Yii::$app->user->identity->id;
		if(Yii::$app->user->login($user)){
			$session = Yii::$app->session;
			$session->set('or-usr', $original);
			return $this->redirect(['/site/index']);
		}
		
	}

	
	


}
