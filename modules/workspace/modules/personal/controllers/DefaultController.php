<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes
use app\models\messages\Message;
use app\models\messages\Notification;
use app\models\pnrd\PersonalData;
use app\models\identity\Personnel;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `personal` module
 */
class DefaultController extends Controller
{
    /**
     * default action - user/staff member personal page
     *
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        // current user
        $model = Yii::$app->user->getIdentity();

        // checking if exist employee for current user; if no - redirect to '/workspace'
        if (!Personnel::find()->where(['user_id' => $model->id])->exists()) {
            Yii::$app->session->setFlash('danger' ,'Сотрудника с таким идентификатором не существует');
            return $this->redirect('/workspace');
        }

        $message = new Message();
        $notifications = new ActiveDataProvider([
            'query' => Notification::find()->where(['user_id' => $model->id])
        ]);

        $author = $model->author; // author connected with current user
        $staff = Personnel::find()->where(['user_id' => $model->id])->one(); // staff record connected with current user
        $personal = new PersonalData($model); // PersonalData object

        return $this->render('index', [
            'model' => $model,
            'personaldata' => $personal,
            'notifications' => $notifications,
            'author' => $author,
            'message' => $message,
            'personal' => $staff,
        ]);
    } // end action


    /**
     *
     */
    public function actionAuthor()
    {
        echo "current author";
    } // end function


    /**
     *
     */
    public function actionStaff()
    {
        echo "current staff member";
    } // end function

} // end class
