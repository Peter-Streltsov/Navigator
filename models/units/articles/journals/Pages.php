<?php

namespace app\models\units\articles\journals;

use yii\db\ActiveRecord;

/**
 * Model class for table "article_journals_pages";
 *
 * @property int $id
 * @property int $article_id
 * @property int $begin_page
 * @property int $end_page
 */
class Pages extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'article_journals_pages';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['article_id', 'begin_page'], 'required'],
            [['article_id', 'begin_page', 'end_page'], 'integer'],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'begin_page' => 'Begin Page',
            'end_page' => 'End Page',
        ];

    } // end function



    /**
     * @inheritdoc
     * @return ArticlePagesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticlePagesQuery(get_called_class());

    } //  end function

} // end class
