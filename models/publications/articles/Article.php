<?php

namespace app\models\publications\articles;

// project classes
use app\interfaces\ArticleInterface;
use app\interfaces\ArticleValuesInterface;
use app\models\publications\Publication;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\publications\articles\traits\ArticleValuesTrait;
use app\models\publications\articles\traits\SchemeTrait;
use app\models\publications\articles\traits\ArticleTrait;
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
abstract class Article extends Publication implements ArticleInterface, ArticleValuesInterface
{

    use ArticleTrait; // ArticleInterface implementation
    use ArticleValuesTrait; // ArticleValuesInterface implementation

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

} // end class
