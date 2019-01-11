<?php

namespace app\controllers;

// project classes
use app\models\basis\Organisation;
use app\models\LoginForm;
use app\models\ContactForm;
// yii classes
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

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
                'only' => ['logout'],
                'rules' => [
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
    } // end function


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
    } // end function


    /**
     * Displays homepage;
     *
     * @return string
     */
    public function actionIndex()
    {
        if (isset($_GET['denyrequest'])) {
            \Yii::$app->session->setFlash('danger', 'Доступ к запрашиваемому ресурсу невозможен');
        }

        $organisation = Organisation::find()->where(['id' => 1])->one();

        return $this->render('index', [
            'organisation' => $organisation
        ]);
    } // end action


    /**
     * Login action;
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        //VarDumper::dump(AccessControl);

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

    } // end action


    /**
     * Logout action;
     *
     * @return Response
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();

    } // end action


    /**
     * Displays contact page;
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    } // end action

} // end class
