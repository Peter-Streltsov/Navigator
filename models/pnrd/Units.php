<?php

namespace app\models\pnrd;

use app\models\publications\articles\collections\ArticleCollection;
use app\models\publications\articles\conferences\ArticleConference;
use app\models\publications\articles\journals\ArticleJournal;
use app\models\publications\dissertations\Dissertations;
use app\models\publications\monograph\Monograph;

/**
 * Class Units
 * Wraps creating and receiving unit models for PNRD classes
 *
 * @package app\models\pnrd\facades
 */
class Units
{

    private $articlesJournals;
    private $articlesConferences;
    private $articlesCollections;
    private $monographs;
    private $dissertations;

    public function __construct()
    {
        $this->articlesJournals = new ArticleJournal();
        $this->articlesConferences = new ArticleConference();
        $this->articlesCollections = new ArticleCollection();
        $this->monographs = new Monograph();
        $this->dissertations = new Dissertations();
    } // end constructor

    /**
     * returns ArticleJournalsQuery
     */
    public function articlesJournals()
    {
        return $this->articlesJournals->find();
    } // end function


    /**
     * returns ArticleConferenceQuery
     */
    public function articlesConferences()
    {
        return $this->articlesConferences->find();
    } // end function


    /**
     * returns ArticleCollectionQuery
     */
    public function articlesCollections()
    {
        return $this->articlesCollections->find();
    } // end function


    /**
     * return MonographQuery
     */
    public function monographs()
    {
        return $this->monographs->find();
    } // end function


    /**
     * returns DissertationQuery
     */
    public function dissertations()
    {
        return $this->dissertations->find();
    } // end function

} // end class
