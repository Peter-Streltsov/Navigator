<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\Users;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

class PersonalController extends \yii\web\Controller
{

    /**
     * @param $id
     * @return string
     */
    public function actionIndex($id)
    {

        $model = Users::find()->where(['id' => $id])->one();
        $author = Authors::find()->where(['user_id' => $model->id])->one();
        $staff = Personnel::find()->where(['user_id' => $id])->one();
        Articles::$authorid = $model->id;

        $authorarticles = ArticlesAuthors::find()->where(['author_id' => $author->id])->joinWith('articlesbyauthor')->asArray()->all();

        foreach ($authorarticles as $article) {
            $articles[] = $article['articlesbyauthor'][0];
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $articles
        ]);

        $personalprovider = new ActiveDataProvider([
            'query' => Personnel::find()->where(['id' => $id])->one()
        ]);

        return $this->render('index', [
            'model' => $model,
            'articles' => $articles,
            'dataprovider' => $dataProvider,
            'staffdata' => $personalprovider,
            'personal' => $staff
        ]);

    } // end action



    /**
     *
     */
    public function actionMessage()
    {

    } // end action

} // end class
