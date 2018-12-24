<?php

namespace app\modules\workspace\modules\admin\controllers;

// project models
use app\models\identity\Users;
use app\models\identity\Roles;
use app\models\identity\Authors;
use app\models\identity\Personnel;
// yii classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{

    /**
     * alows only post method for delete action
     *
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    } // end function


    /**
     * Lists all Users models;
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Users::find(),
        ]);
        return $this->renderAjax('index', [
            'dataProvider' => $dataProvider,
        ]);
    } // end action


    /**
     * Displays a single User;
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view_ajax', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id)
            ]);
        }
    } // end action


    /**
     * Creates a new User;
     * generates random password for user
     * If creation successful, will redirect to the 'view' page
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Users();
        $tokens = Roles::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {

            $password = '';
            $chars = [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e',
                'f','g','h','i','j','k','l','m','n','o','p',
                'q','r','s','t','u','v','w','x','y','z','A',
                'B','C','D','E','F','G','H','I','J','K','L',
                'M','N','O','P','Q','R','S','T','U','V','W',
                'X','Y','Z'];

            $i = 7;

            while ($i >= 0) {
                $password .= $chars[mt_rand(0, (count($chars) - 1))];
                $i--;
            }

            $model->password = $password;

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'tokens' => $tokens
        ]);
    } // end action


    /**
     * Updates an existing User model;
     * If update successful, will redirect to 'view' page
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //VarDumper::dump($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $tokens = Roles::find()->select('token')->asArray()->all();

        return $this->renderAjax('update', [
            'model' => $model,
            'tokens' => $tokens
        ]);
    } // end action


    /**
     * Deletes an existing Users model;
     * If deletion successful, will redirect to 'index' page;
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    } // end action


    /**
     * making new author from existing user
     *
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionMakeauthor($id)
    {
        $user = Users::find()->where(['id' => $id])->asArray()->one();

        if (Authors::find()->where(['user_id' => $id])->exists()) {
            Yii::$app->session->setFlash('danger', "Автор с таким идентификатором пользоватея уже существует");
            return $this->redirect('/workspace/admin/users');
        }

        $staff = Personnel::find()->where(['user_id' => $user['id']])->one();

        $newauthor = new Authors();
        $newauthor->name = $user['name'];
        $newauthor->lastname = $user['lastname'];
        $newauthor->user_id = $user['id'];
        if (isset($staff[0]['id'])) { $newauthor->staff_id = $staff[0]['id']; }
        $newauthor->save();

        $createdauthor = Authors::find()->where(['user_id' => $id])->one();

        return $this->redirect('/workspace/authors/update?id='.$createdauthor->id);
    } // end function


    /**
     * making new staff member from existing user
     *
     * @param $id integer
     * @return \yii\web\Response
     */
    public function actionMakestaff($id)
    {
        $user = Users::find()->where(['id' => $id])->asArray()->one(); // getting user to make personnel

        if (Personnel::find()->where(['user_id' => $id])->exists()) {
            Yii::$app->session->setFlash('danger', "Сотрудник с таким идентификатором пользоватея уже существует");
            return $this->redirect('/workspace/admin/users');
        }

        $newstaff = new Personnel(); // creating new staff
        $newstaff->name = $user['name'];
        $newstaff->lastname = $user['lastname'];
        $newstaff->user_id = $user['id'];

        if ($newstaff->save()) {
            $createdstaff = Personnel::find()->where(['user_id' => $id])->one(); // getting just created staff
            return $this->redirect('/workspace/personnel/view?id='.$createdstaff->id); // redirect to edit further data
        } else {
            Yii::$app->session->setFlash('danger', 'Не удалось добавить сотрудника');
            return $this->redirect('/workspace/admin/users/view?id=' . $id);
        }
    } // end action


    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    } // end function

} // end class
