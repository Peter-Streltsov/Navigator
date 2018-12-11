<?php

namespace app\models\publications\articles\traits;

// project classes
use app\models\pnrd\indexes\IndexesArticles;

trait ArticleTrait
{

    /**
     * calculates and returns PNRD index for current article model
     *
     * @return float
     */
    public function getIndexValue()
    {
        if (isset($this->type)) {
            $index = IndexesArticles::find()->select('value')->where(['id' => $this->type])->asArray()->one();
            return (float)$index['value'];
        }
    } // end function


    /**
     * @param $author_id
     * @return Authors|array|null
     */
    public function getAuthorJunction($author_id)
    {
        $authors = $this->currentNamespace() . 'Authors';
        return $authors::find()->where(['author_id' => $author_id])->one();
    } // end function


    /**
     * @param $author_id
     * @return float|int
     */
    public function getIndexByAuthor($author_id)
    {
        $index_value = IndexesArticles::find()->where(['id' => $this->class])->one();
        $index_value = $index_value->value;
        $part = $this->getAuthorJunction($author_id)->part;
        if ($part == null) {
            $part = 10;
        }
        return ($part * $index_value) / 100;
    } // end function

} // end trait
