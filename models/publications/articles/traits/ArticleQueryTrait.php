<?php

namespace app\models\publications\articles\traits;

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
    public function byYear(int $year)
    {

        return $this->andWhere(['year' => $year]);

    } // end function



    /**
     * ads query parameter - 'year' == current year
     */
    public function currentYear()
    {

        return $this->andWhere(['year' => date('Y')]);

    } // end function



    /**
     *
     */
    public function byAuthor()
    {

    } // end function

} // end trait
