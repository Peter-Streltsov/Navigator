<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes
use app\modules\Control\models\Notifications; // !!!
use app\modules\Control\models\Fileupload;
use app\modules\Control\models\Articles; // !!!
use app\modules\Control\models\ArticlesAuthors; // !!!
use app\modules\Control\models\Authors;
use app\modules\Control\models\Upload;
use app\modules\Control\models\UploadCategories;
use app\models\messages\Message;
use app\models\messages\MessageClasses; // !!!
use app\modules\Control\units\PNRD;
use app\models\identity\Users; // !!!
// yii classes
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/**
 * Class ActionController
 * Provides user actions for Personal module
 *
 * @package app\modules\Control\controllers
 */
class ActionController extends Controller
{

    /**
     * Creates new uploaded data (candidate for articles, monograph etc.)
     *
     * @return string|\yii\web\Response
     */
    public function actionUpload()
    {

        $model = new Upload();

        if (isset($_POST['upload_flag'])) {
            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');

            $model->uploadedfile = (string)$file->name;
            $model->load(Yii::$app->request->post());

            $folder = '';

            switch ($model->class) {
                case 'Статья':
                    $folder = 'articles';
                    break;
                case 'Монография':
                    $folder = 'monograph';
                    break;
                case 'Диссертация':
                    $folder = 'dissertations';
                    break;
            }

            $file->upload($folder);

            if ($model->save()) {
                Yii::$app->session->setFlash('info', 'Данные загружены');
            } else {
                ob_start();
                $error_message = '';
                $errors = $model->getErrors();
                var_dump($errors);
                $error_message = ob_get_contents();
                ob_get_clean();
                /*foreach ($errors as $error) {
                    $error_message = $error_message;
                }*/
                Yii::$app->session->setFlash('danger', $error_message);

            }
        }

        $user = Yii::$app->user->getIdentity();
        $author = Authors::find()->where(['user_id' => $user->id])->one();
        $classes = UploadCategories::find()->asArray()->all();
        $classes = ArrayHelper::map($classes, 'class', 'class');
        $file = new Fileupload();

        return $this->render('uploaddata', [
            'model' => $model,
            'classes' => $classes,
            'user' => $user,
            'author' => $author,
            'file' => $file,
        ]);

    } // end action



    /**
     * renders all user notifications
     *
     * @return string
     */
    public function actionNotifications()
    {

        $user = Yii::$app->user->getIdentity();

        $notifications = new ActiveDataProvider([
            'query' => Notifications::find()->where(['user_id' => $user->id])
        ]);

        return $this->render('notifications', [
            'notifications' => $notifications
        ]);

    } // end action



    /**
     * Creates a new user message
     * If creation successful, will redirect to 'view' page
     *
     * @return mixed
     */
    public function actionCreate($id)
    {

        $user = Yii::$app->user->getIdentity();

        $model = new Message();
        $model->username = $user->username;

        $classes = MessageClasses::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Yii::$app->user->getIdentity();
            return $this->redirect(['/control/personal', 'id' => $user->id]);
        }

        return $this->render('createmessage', [
            'model' => $model,
            'classes' => $classes
        ]);

    } // end action



    public function actionLoaduserimage()
    {

    } // end action

} // end class
