<?php

namespace app\models\units\articles\traits;

// project classes
use app\models\common\Languages;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\units\articles\journals\Authors;
use app\models\identity\Authors as AuthorsCommon;
// yii classes
use Yii;

/**
 * Trait UnitTrait
 * Implements UnitInterface methods common for articles models (journals, conferencies and collections)
 *
 * @package app\models\units\articles\traits
 */
trait UnitTrait
{
    /**
     *
     * @return array
     */
    public function getAuthors()
    {
        $authors = Authors::find()->where(['article_id' => $this->id])->all();
        $result = [];
        if (count($authors) >= 1) {
            foreach ($authors as $authorlink) {
                $author = AuthorsCommon::find()->where(['id' => $authorlink->author_id])->asArray()->one();
                $result[] = $author;
            }
        }
        return $result;
    } // end function


    public function getLanguageValue()
    {
        $language = Languages::find()->where(['id' => $this->language])->one();
        return $language != null ? $language->language : null;
    } // end function


    /**
     * returns string value for current article publications class
     *
     * @return string
     */
    public function publicationClass()
    {

    } // end function


    /**
     * calculates and returns PNRD index for current article model
     *
     * @return float
     */
    public function getIndex()
    {
        if (isset($this->type)) {
            $index = IndexesArticles::find()->select('value')->where(['id' => $this->type])->asArray()->one();
            return (float)$index['value'];
        }
    } // end function


    /**
     * calculates personal index for current article using article affilations and user identity model
     * should be used ONLY in 'authorized' controllers (control module and submodules - user dependent)
     *
     * @return float
     */
    public function getPersonalIndex()
    {
        $user = Yii::$app->user->getIdentity();
    } // end function


    /**
     * @param $author_id
     * @return Authors|array|null
     */
    public function getAuthorJunction($author_id)
    {
        //return $this->hasOne(Authors::className(), ['author_id' => $author_id]);
        return Authors::find()->where(['author_id' => $author_id])->one();
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
