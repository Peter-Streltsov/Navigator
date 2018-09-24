<?php

namespace app\models\units\articles;

// project classes
use app\interfaces\UnitInterface;
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
    use ArticleQueryTrait;
    use UnitTrait;

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
     * @return \yii\db\ActiveQuery
     */
    public function getPublicationclass()
    {

        return $this->hasOne(IndexesArticles::className(), ['id' => 'class']);

    } // end function

} // end class
