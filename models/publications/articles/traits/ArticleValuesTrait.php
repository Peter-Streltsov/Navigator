<?php

namespace app\models\publications\articles\traits;

use app\models\common\Languages;
use app\models\pnrd\indexes\IndexesArticles;

/**
 * Trait ArticleValuesTrait
 * Implements methods from ArticleValuesInterface
 * Article model using this trait MUST have properties $type, $class and $language (all integer);
 *
 * @package app\models\publications\articles\traits
 */
trait ArticleValuesTrait
{

    /**
     * returns type property value from linked to current article Types model;
     * Types model MUST be placed in the same namespace with article ActiveRecord;
     *
     * @return string
     */
    public function getTypeValue()
    {
        return Types::find()->where(['id' => $this->type])->one()->type;
    } // end function


    /**
     * returns PNRD index values from linked to current article IndexesArticles model;
     *
     * @return float
     */
    public function getClassValue()
    {
        return IndexesArticles::find()->where(['id' => $this->class])->one()->value;
    } // end function


    /**
     * returns language property value from linked to current article Languages model;
     *
     * @return string
     */
    public function getLanguageValue()
    {
        return Languages::find()->where(['id' => $this->language])->one()->language;
    } // end function

} // end class
