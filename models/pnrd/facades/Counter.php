<?php

namespace app\models\pnrd\facades;

use app\models\pnrd\Units;

/**
 * Class Counter
 * Provides methods for counting created unit records
 *
 * @package app\models\pnrd\facades
 */
class Counter
{

    private $articlesJournals;
    private $articlesConferences;
    private $articlesCollections;
    private $monographs;
    private $dissertations;

    public function __construct(Units $units)
    {

        $this->articlesJournals = $units->articlesJournals();
        $this->articlesConferences = $units->articlesConferences();
        $this->articlesCollections = $units->articlesCollections();
        $this->monographs = $units->monographs();
        $this->dissertations = $units->dissertations();

    } // end constructor


    /**
     * @return int
     */
    public function articlesJournals()
    {
        return (int)$this->articlesJournals->count();
    } // end function



    public function articlesConference()
    {

    } // end function



    public function articlesCollections()
    {

    } // end function



    public function monograph()
    {

    } // end function



    public function dissertations()
    {

    }

} // end class
