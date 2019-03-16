<?php

namespace app\modules\PublicAccess\models;

use app\models\publications\monograph\Monograph;
use app\models\publications\articles\collections\ArticleCollection;
use app\models\publications\articles\conferences\ArticleConference;
use app\models\publications\articles\journals\ArticleJournal;
use yii\base\Model;

class PublicModel extends Model
{

    public function getArticlesJournals()
    {

    } // end function


    public function getArticlesConferences()
    {

    } // end function


    public function getArticlesCollections()
    {

    } // end function


    public function getPublications()
    {

        $articlesJournals = ArticleJournal::find()->asArray()->all();
        $articlesConferences = ArticleConference::find()->asArray()->all();
        $articlesCollections = ArticleCollection::find()->asArray()->all();
        $monographs = Monograph::find()->asArray()->all();

        $i = 0;

        foreach ($articlesJournals as $article) {
            $model[$i][] = $article['title'];
            $model[$i][] = $article['subtitle'];
            $model[$i]['type'] = 'статья';
            $i++;
        }

        foreach ($monographs as $monograph) {
            $model[$i][] = $monograph['title'];
            $model[$i][] = $monograph['subtitle'];
            $model[$i]['type'] = 'монография';
            $i++;
        }

        //VarDumper::dump($model);

        return $model;

    } // end function

} // end class
