<?php

namespace app\models\units\articles\traits;

/**
 * Trait ArticleQueryTrait
 * Implements ActiveQuery methods for article units
 *
 * @package app\models\traits
 */
trait ArticleQueryTrait
{


    /**
     *
     */
    public function byYear($year)
    {

        return $this->where(['year' => $year]);

    } // end function



    /**
     *
     */
    public function currentYear()
    {

    } // end function



    /**
     *
     */
    public function byAuthor()
    {

    } // end function

} // end trait
