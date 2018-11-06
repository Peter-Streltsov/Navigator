<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes
use app\models\pnrd\PersonalData;
use app\models\identity\Users;
use app\models\identity\Authors;
use app\models\identity\Personnel;
// yii2 classes
use Yii;
use yii\web\Controller;


/**
 * Default controller for the `personal` module
 */
class DefaultController extends Controller
{

    /**
     * default action - user/staff member personal page
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionIndex($id)
    {

        // current user
        $model = Users::find()->where(['id' => $id])->one();

        // checking if exist employee for current user; if no - redirect to '/workspace'
        if (!Personnel::find()->where(['user_id' => $model->id])->exists()) {
            Yii::$app->session->setFlash('danger' ,'Сотрудника с таким идентификатором не существует');
            return $this->redirect('/workspace');
        }

        $author = Authors::find()->where(['user_id' => $model->id])->one(); // author connected with current user
        $staff = Personnel::find()->where(['user_id' => $id])->one(); // staff record connected with current user
        $personal = new PersonalData(); // PersonalData object
        $articles = $personal->getArticles(); // all articles for author connected with current user

        return $this->render('index', [
            'model' => $model,
            'personaldata' => $personal,
            //'articles' => $articles,
            //'currentarticles' => $currentarticles,
            //'dataprovider' => $dataProvider,
            'personal' => $staff,
            //'indexes' => $indexes,
            //'meanindex' => $meanindex,
        ]);

    } // end action

} // end class
