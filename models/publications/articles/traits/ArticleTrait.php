<?php

namespace app\models\publications\articles\traits;

/**
 * Trait ArticleTrait
 * Implements methods from app\interfaces\ArticleInterface
 */
trait ArticleTrait
{

    /**
     * finds and returns Pages model linked to current article (via article_id property)
     *
     * @return Pages - Pages model object from current namespace
     */
    public function getPages()
    {
        return $this->hasOne(Pages::className(), ['article_id' => $this->id]);
    } // end function


    /**
     * @return array
     */
    public function getAuthors()
    {
        $authors = $this->currentNamespace() . 'Authors';
        $authors = $authors::find()->where(['article_id' => $this->id])->all();
        $result = [];
        if (count($authors) >= 1) {
            foreach ($authors as $authorlink) {
                $author = AuthorsCommon::find()->where(['id' => $authorlink->author_id])->asArray()->one();
                $result[] = $author;
            }
        }
        return $result;
    } // end function


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

} // end class
