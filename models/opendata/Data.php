<?php

namespace app\models\opendata;

use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferences\ArticleConference;
use app\models\units\articles\journals\ArticleJournal;

/**
 * Class Data
 *
 * @package app\models\publicdata
 *
 */
class Data
{

    /**
     *
     *
     * @return array
     */
    public static function getArticles()
    {

        $articles_journals = ArticleJournal::find()->asArray()->all();
        $articles_conferencies = ArticleConference::find()->asArray()->all();
        $articles_collections = ArticleCollection::find()->asArray()->all();
        return array_merge($articles_journals, $articles_conferencies, $articles_collections);

    } // end function

} // end class
