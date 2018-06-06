<?php

namespace app\modules\Control\controllers;

use Yii;
use app\modules\Control\models\Articles;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\Messages;
use app\modules\Control\models\MessagesClasses;
use app\modules\Control\units\PNRD;
use app\modules\Control\models\Users;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class PersonalController extends \yii\web\Controller
{

    /**
     * Personal page action
     * Displayed publications, personal data, indexes etc.
     *
     * @param $id
     * @return string
     */
    public function actionIndex($id)
    {

        // current user
        // TODO: replace with user identity (?)
        $model = Users::find()->where(['id' => $id])->one();

        // checking if exist author for current user; if no - redirect to '/control'
        if (!Authors::find()->where(['user_id' => $model->id])->exists()) {

            \Yii::$app->session->setFlash('danger' ,'Автора с таким идентификатором не существует');

            return $this->redirect('/control');
        }

        // author connected with current user
        $author = Authors::find()->where(['user_id' => $model->id])->one();

        // staff record connected with current user
        $staff = Personnel::find()->where(['user_id' => $id])->one();

        // all articles for author connected with current user
        $articles = Articles::getArticlesForAuthor($author->id);

        // articles published in current year
        $currentarticles = Articles::getCurrentArticles($author->id);

        $meanindex = PNRD::meanIndex();

        // indexes for all articles in current year
        $indexes['articles'] = PNRD::personalArticlesIndex($author->id);

        // datapdovider for author's articles
        $dataProvider = new ArrayDataProvider([
            'allModels' => $articles
        ]);


        return $this->render('index', [
            'model' => $model,
            'articles' => $articles,
            'currentarticles' => $currentarticles,
            'dataprovider' => $dataProvider,
            'personal' => $staff,
            'indexes' => $indexes,
            'meanindex' => $meanindex,
        ]);

    } // end action


    /**
     * Creates a new user message
     * If creation is successful, the will redirect to the 'view' page
     *
     * @return mixed
     */
    public function actionCreate($id)
    {

        $user = Yii::$app->user->getIdentity();

        $model = new Messages();
        $model->username = $user->username;

        $classes = MessagesClasses::find()->asArray()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Yii::$app->user->getIdentity();
            return $this->redirect(['/control/personal', 'id' => $user->id]);
        }

        return $this->render('createmessage', [
            'model' => $model,
            'classes' => $classes
        ]);

    } // end action

} // end class
