<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes
use app\models\filesystem\Fileupload;
use app\models\identity\Users;
use app\models\messages\Message;
use app\models\messages\Notification;
use app\models\pnrd\PersonalData;
use app\models\identity\Personnel;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\search\User;
use yii\web\Controller;

/**
 * Default controller for the `personal` module;
 * Contains single action displaying personal page;
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

        //------------------------------------------------------------------------------------------------------------//

        /**
         * retrieving current user model (app\identity\Users);
         */
        $model = Yii::$app->user->getIdentity();
        //$model = Users::find()->where(['id' => $id])->one();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * checking if exist employee for current user; if no - redirect to '/workspace'
         */
        if (!Personnel::find()->where(['user_id' => $model->id])->exists()) {
            Yii::$app->session->setFlash('danger' ,'Сотрудника с таким идентификатором не существует');
            return $this->redirect('/workspace');
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $file = new Fileupload();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * creating Message model and saving it in case post request method;
         * setting flash messages;
         */
        $message = new Message();
        if (Yii::$app->request->post() && $message->load(Yii::$app->request->post())) {
            $message->save();
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * getting notifications for current user;
         */
        $notifications = new ActiveDataProvider([
            'query' => Notification::find()->where(['user_id' => $model->id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * Author model linked to current user;
         */
        $author = $model->author;

        //------------------------------------------------------------------------------------------------------------//

        /**
         * Personnel (staff member) connected to current user;
         */
        $staff = Personnel::find()->where(['user_id' => $model->id])->one(); // staff record connected with current user

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $personal = new PersonalData($model);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * rendering view;
         */
        return $this->render('index', [
            'model' => $model,
            'file' => $file,
            'personaldata' => $personal,
            'notifications' => $notifications,
            'author' => $author,
            'message' => $message,
            'personal' => $staff,
        ]);

    } // end action

} // end class
