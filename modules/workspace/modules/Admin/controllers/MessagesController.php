<?php

namespace app\modules\workspace\modules\Admin\controllers;

// project classes
use app\models\messages\MessageClasses;
//use app\models\Upload; TODO: change namespace;
use app\models\messages\Message;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessagesController
 * Implements the CRUD actions for Messages model (user massages)
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
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionUsers()
    {
        $messagesProvider = new ActiveDataProvider([
            'query' => Message::find(),
        ]);

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('index', [
                'messagesProvider' => $messagesProvider,
            ]);
        } else {
            return $this->render('index', [
                'messagesProvider' => $messagesProvider,
            ]);
        }
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
