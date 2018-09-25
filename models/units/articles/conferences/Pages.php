<?php

namespace app\models\units\articles\conferences;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "article_pages".
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

        return 'article_conferencies_pages';

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
     *
     * @return PagesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new PagesQuery(get_called_class());

    } // end function

} // end class
