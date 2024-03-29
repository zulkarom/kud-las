<?php

namespace backend\controllers;

use backend\models\Kejohanan;
use common\models\ChangePasswordForm;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

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
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'change-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'return-role'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $kejohanan = Kejohanan::findOne(['is_active' => 1]);
        
        return $this->render('index', [
            'kejohanan' => $kejohanan
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword(){
        $id = Yii::$app->user->id;
     
        try {
            $model = new ChangePasswordForm($id);
        } catch (InvalidParamException $e) {
            throw new \yii\web\BadRequestHttpException($e->getMessage());
        }
     
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Password Changed!');
            return $this->refresh();
        }
     
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionReturnRole()
	{
		$session = Yii::$app->session;
		if ($session->has('or-usr')){
			$id = $session->get('or-usr');
			$user = User::findIdentity($id);
				if(Yii::$app->user->login($user)){
					$session->remove('or-usr');
					return $this->redirect(['/site/index']);
				}
			
		}else{
			throw new NotFoundHttpException('The requested page does not exist..');
		}
		
	}
}
