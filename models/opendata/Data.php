<?php

namespace app\models\opendata;

use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferences\ArticleConference;
use app\models\units\articles\journals\ArticleJournal;
use app\models\units\dissertations\Dissertations;
use app\models\units\monograph\Monograph;
// yii classes
use yii\base\Model;

/**
 * Class Data
 * contains static methods collecting free accessible data
 *
 * @package app\models\publicdata
 *
 */
class Data extends Model
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
     * lists all added Monographs in array of ActiveRecords
     *
     * @return Monograph[]|array
     */
    public static function getMonographs()
    {
        return Monograph::find()->all();
    } // end function


    /**
     * lists all added Dissertations in array of ActiveRecords
     *
     * @return Dissertations[]|\app\models\units\dissertations\DissertationTypes[]|array
     */
    public static function getDissertations()
    {
        return Dissertations::find()->all();
    } // end function


} // end class
