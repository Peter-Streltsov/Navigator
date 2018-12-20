<?php

namespace app\models\publications\articles;

// project classes
use app\interfaces\ArticleInterface;
use app\interfaces\ArticleValuesInterface;
use app\interfaces\PNRDInterface;
use app\models\publications\Publication;
use app\models\identity\Authors as AuthorsCommon;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\common\Languages;

/**
 * Class Article
 * Basic class for articles models;
 *
 * All extending classes MUST have the following properties:
 * @property int $type - describes current article type
 * @property int $class - describes current article class (PNRD index
 * from app\models\pnrd\indexes\IndexesArticles)
 *
 * @package app\models\units\articles
 */
abstract class Article extends Publication implements ArticleInterface, ArticleValuesInterface, PNRDInterface
{

    /**
     * should not be used and must be redefined in child classes
     *
     * @deprecated
     * @return string
     */
    public static function tableName()
    {
        return 'articles_' . static::$class;
    } // end function


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $this->savePublisher();

        // saving language
        $newlanguage = new Languages();
        $newlanguage->language = strtolower($this->language);
        $newlanguage->save();
    } // end function


    /**
     * uses SchemeTrait deleteLinkedData() method
     *
     * @inheritdoc
     */
    public function afterDelete()
    {
        parent::afterDelete();
        $this->deleteLinkedData();
    } // end function


    /**
     * saving publisher for current article (on update and create actions)
     */
    public function savePublisher()
    {
        if (isset($this->magazine)) {
            $newmagazine = new Magazines();
            $newmagazine->magazine = $this->magazine;
            $newmagazine->save();
        }

        /**
         *
         */

        /*if (isset($this->conference_collection)) {
            $conference = new Conference();
            $conference->name = $this->conference_collection;
            $conference->section = $this->section;
            $conference->save();
        }*/
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicationclass()
    {
        return $this->hasOne(IndexesArticles::className(), ['id' => 'class']);
    } // end function


    /**
     * finds and returns Pages model linked to current article (via article_id property)
     *
     * @return - Pages model object from current namespace
     */
    public function getPages()
    {
        $pages_class = $this->namespace . 'Pages';
        return $this->hasOne($pages_class::className(), ['article_id' => $this->id]);
    } // end function


    /**
     * @return array
     */
    public function getAuthors()
    {
        $authors_class = $this->namespace . 'Authors';
        $authors = $authors_class::find()->where(['article_id' => $this->id])->all();
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
        $authors = $this->namespace . 'Authors';
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



    /**
     * returns type property value from linked to current article Types model;
     * Types model MUST be placed in the same namespace with article ActiveRecord;
     *
     * @return string
     */
    public function getTypeValue()
    {
        $types_class = $this->namespace . 'Types';
        return $types_class::find()->where(['id' => $this->type])->one()->type;
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
