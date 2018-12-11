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

} // end class
