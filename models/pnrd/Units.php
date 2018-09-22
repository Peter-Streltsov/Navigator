<?php

namespace app\models\pnrd;

use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferencies\ArticleConferency;
use app\models\units\articles\journals\ArticleJournal;
use app\models\units\dissertations\Dissertations;

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
        $this->articlesConferences = new ArticleConferency();
        $this->articlesCollections = new ArticleCollection();
        $this->monographs = null;
        $this->dissertations = new Dissertations();

    } // end constructor

    /**
     *
     */
    public function articlesJournals()
    {

        return $this->articlesJournals->find();

    } // end function



    /**
     *
     */
    public function articlesConferences()
    {

        return $this->articlesConferences->find();

    } // end function



    /**
     *
     */
    public function articlesCollections()
    {

        return $this->articlesCollections->find();

    } // end function



    /**
     * TODO: replace stub with implementation
     */
    public function monographs()
    {

        return null;

    } // end function



    /**
     *
     */
    public function dissertations()
    {

        return $this->dissertations->find();

    } // end function

} // end class
