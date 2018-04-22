<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\PNRD;
use app\modules\Control\models\Users;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

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

} // end class
