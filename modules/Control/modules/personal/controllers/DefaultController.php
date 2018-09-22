<?php

namespace app\modules\Control\modules\personal\controllers;

// project classes
use app\models\pnrd\PersonalData;
use app\models\identity\Users;
use app\modules\Control\models\Authors;
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
        // TODO: replace with user identity (?)
        $model = Users::find()->where(['id' => $id])->one();
        //$model = Yii::$app->user->identity;

        // checking if exist employee for current user; if no - redirect to '/control'
        if (!Personnel::find()->where(['user_id' => $model->id])->exists()) {

            Yii::$app->session->setFlash('danger' ,'Сотрудника с таким идентификатором не существует');
            return $this->redirect('/control');
        }

        $author = Authors::find()->where(['user_id' => $model->id])->one(); // author connected with current user
        $staff = Personnel::find()->where(['user_id' => $id])->one(); // staff record connected with current user
        $personal = new PersonalData(); // PersonalData object
        $articles = $personal->getArticles(); // all articles for author connected with current user

        //$meanindex = PNRD::meanIndex();

        // indexes for all articles in current year
        //$indexes['articles'] = PNRD::personalArticlesIndex($author->id);

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
