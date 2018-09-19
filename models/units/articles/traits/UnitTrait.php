<?php

namespace app\models\units\articles\traits;

use app\models\pnrd\indexes\IndexesArticles;

/**
 * Trait UnitTrait
 * Implements UnitInterface methods common for articles models (journals, conferencies and collections)
 *
 * @package app\models\units\articles\traits
 */
trait UnitTrait
{

    /**
     * private method returning namespace of class, using current trait method
     *
     * @return string
     */
    private function currentNamespace()
    {

        $current_class = explode('\\', __CLASS__);
        array_pop($current_class);
        return implode('\\', $current_class) . '\\';

    } // end function



    /**
     *
     * @return array
     */
    public function authors()
    {

        $authorsname = $this->currentNamespace() . 'Authors';
        return (new $authorsname())::find()->where(['article_id' => $this->id])->all();

    } // end function



    /**
     *
     */
    public function languageValue()
    {

    } // end function



    /**
     * calculates and returns PNRD index for current article model
     *
     * @return int
     */
    public function index()
    {

        $index = IndexesArticles::find()->select('value')->where(['id' => $this->type])->one();

    } // end function



    /**
     *
     */
    public function personalIndex()
    {

    } // end function

} // end trait
