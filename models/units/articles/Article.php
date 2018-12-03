<?php

namespace app\models\units\articles;

// project classes
use app\interfaces\UnitInterface;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\units\articles\traits\ArticleQueryTrait;
use app\models\units\articles\traits\SchemeTrait;
use app\models\units\articles\traits\UnitTrait;
use app\models\common\Languages;
// yii classes
use yii\db\ActiveRecord;

/**
 * Class Article
 *
 * @package app\models\units\articles
 */
class Article extends ActiveRecord implements UnitInterface
{

    use SchemeTrait;
    use UnitTrait;

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
