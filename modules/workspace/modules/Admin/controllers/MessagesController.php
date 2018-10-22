<?php

namespace app\modules\workspace\modules\Admin\controllers;

// project classes
use app\models\messages\MessageClasses;
use app\models\messages\Notification;
//use app\models\Upload; TODO: change namespace;
use app\models\messages\Message;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessagesController implements the CRUD actions for Messages model.
 */
class MessagesController extends Controller
{

    /**
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
     * lists messages from users
     *
     * @param null $set
     * @param null $id
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionUsers($set = null, $id = null)
    {

        if (isset($set) && isset($id)) {
            $newmodel = Message::find()->where(['id' => $id])->one();
            $newmodel->read = true;
            $newmodel->save();
            return $this->redirect('/workspace/admin/messages');
        }

        $messagesProvider = new ActiveDataProvider([
            'query' => Message::find(),
        ]);

        return $this->render('index', [
            'messagesProvider' => $messagesProvider,
        ]);

    } // end action



    /**
     * lists uploaded data from users
     *
     * @deprecated 0.4.55
     * @param null $id
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionUploads($id = null)
    {

        // accept uploaded data
        if (Yii::$app->request->post() && $id != null) {
            $model = Upload::find()->where(['id' => $id])->one();

        }

        // decline uploaded data
        if (Yii::$app->request->post() && $_POST['decline_flag']) {
            $model = new Upload();
        }

        // lists all not accepted uploaded data models
        $uploadsProvider = new ActiveDataProvider([
            'query' => Upload::find()->where(['accepted' => '0'])
        ]);

        $aceptedUploadsProvider = new ActiveDataProvider([
            'query' => Upload::find()->where(['accepted' => '1'])
        ]);

        // view
        return $this->render('uploads', [
            'accepted' => $aceptedUploadsProvider,
            'uploadsProvider' => $uploadsProvider
        ]);

    } // end action



    /**
     * Creates a new user message
     * If creation is successful, will redirect to the 'view' page
     *
     * TODO: delete, moved to PersonalController
     *
     * @deprecated
     * @return mixed
     */
    public function actionCreate()
    {

        $user = Yii::$app->user->getIdentity();

        $model = new Message();
        $model->username = $user->username;

        $classes = MessageClasses::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'classes' => $classes
        ]);

    } // end action



    /**
     * converts Upload model into Articles, Monographies, Reports or Dissertations
     * depending on Upload model class
     *
     * redirects to uploads view page
     *
     * @param $id
     * @return mixed
     */
    public function actionAcceptupload($id)
    {

        $user = Yii::$app->user->getIdentity();

        $upload = Upload::find()->where(['id' => $id])->one();

        switch ($upload->class) {
            case 'Статья':
                if (Upload::createArticle($upload->id)) {
                    $upload->accepted = 1;
                    $upload->save();
                    $text = 'Ваша статья принята администратором ' . $user->name . ' ' . $user->lastname;
                    Notifications::createNotification($upload->author_id, $text);
                    return $this->redirect('/workspace/admin/messages/uploads');
                } else {
                    return $this->redirect('/workspace/admin/messages/uploads?denied=1');
                }
                break;
            case 'Монография':
                break;
        }

        return $this->redirect('/workspace/admin/messages/uploads');

    } // end action



    /**
     * Deletes an existing Messages model.
     * If deletion is successful, the browser will be redirected to the 'index' page
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    } // end action



    /**
     * Finds the Messages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = Messages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
