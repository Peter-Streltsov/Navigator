<?php

namespace app\models\opendata;

use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferences\ArticleConference;
use app\models\units\articles\journals\ArticleJournal;

/**
 * Class Data
 * contains static methods collecting free accessible data
 *
 * @package app\models\publicdata
 *
 */
class Data
{

    /**
     * collects articles of all types and returns them as array of ActiveRecords
     *
     * @return array
     */
    public static function getArticles()
    {

        $articles_journals = ArticleJournal::find()->all();
        $articles_conferencies = ArticleConference::find()->all();
        $articles_collections = ArticleCollection::find()->all();
        return array_merge($articles_journals, $articles_conferencies, $articles_collections);

    } // end function


    /**
     * TODO: implement method;
     *
     * @return null
     */
    public static function getMonographs()
    {
        return [];
    } // end function



    /**
     * TODO: implement method;
     *
     * @return array
     */
    public static function getDissertations()
    {
        return [];
    } // end function


} // end class
