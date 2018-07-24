<?php

namespace app\models\pnrd;

// project classes
use app\models\identity\Users;
use app\models\units\articles\ArticleJournal;
use app\models\units\articles\ArticleCollection;
use app\models\units\articles\conferencies\Article as ArticleConferency;
use app\models\units\dissertations\Dissertations;
use app\modules\Control\models\Personnel;

/**
 * Class Data
 * Facade for 'units' data
 *
 * @since 0.4.60
 * @package app\models\pnrd
 */
class CommonData
{

    public $users;
    public $authors;
    public $employees;
    public $articles;
    public $dissertations;

    public function __construct()
    {

        $this->users = Users::find();
        $this->employees = Personnel::find();

        $this->articles = new \stdClass();
        $this->articles->journals = ArticleJournal::find();
        $this->articles->collections = ArticleCollection::find();
        $this->articles->conferency = ArticleConferency::find();
        $this->dissertations = Dissertations::find();

    } // end construct


    /**
     * COUNTERS
     */


    /**
     * @return mixed
     */
    public function countArticlesJournal()
    {

        return $this->articles->journals->count();

    } // end function



    /**
     * @return mixed
     */
    public function countArticlesCollection()
    {

        return $this->articles->collections->count();

    } // end function




    /**
     * @return int|string
     */
    public function countDissertations()
    {

        return $this->dissertations->count();

    } // end function



    /**
     * ENDCOUNTERS
     */

} // end class
