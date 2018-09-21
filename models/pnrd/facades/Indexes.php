<?php

namespace app\models\pnrd\facades;

use app\models\units\articles\collections\ArticleCollection;
use app\models\units\articles\conferencies\ArticleConferency;
use app\models\units\articles\journals\ArticleJournal;
use app\models\units\dissertations\Dissertations;
use yii\web\IdentityInterface;

/**
 * Class Indexes
 *
 * @package app\models\pnrd\facades
 */
class  Indexes
{

    private $journals;
    private $conferency;
    private $collections;
    private $dissertations;

    public function __construct(ArticleJournal $journal, ArticleConferency $conferency, ArticleCollection $collection, Dissertations $dissertations)
    {

        $this->journals = $journal::find()->all();
        $this->conferency = $conferency::find()->all();
        $this->collections = $collection::find()->all();
        $this->dissertations = $dissertations::find()->all();

    } // end constructor



    public function personal(IdentityInterface $user)
    {

    } // end function



    /**
     * calculates total PNRD index for all registered publications
     *
     * @return int
     */
    public function total()
    {

        $index = [];

        /*$journals = ArticleJournal::find()->all();
        $conferencies = ArticleConferency::find()->all();
        $collections = ArticleCollection::find()->all();
        $dissertations = Dissertations::find()->all();*/

        foreach ($this->journals as $journal) {
            $index[] = $journal->index();
        }

        foreach ($this->conferency as $conferency) {
            $index[] = $conferency->index();
        }

        foreach ($this->collections as $collection) {
            $index[] = $collection->index();
        }

        foreach ($this->dissertations as $dissertation) {
            $index[] = $dissertation->index();
        }

        return (integer)array_sum($index);

    } // end function

} // end class
