<?php

namespace app\models\units\articles;

use app\models\units\articles\CitQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles_citations".
 *
 * @property int $id
 * @property int $article_id
 * @property string $title
 * @property string $class
 */
class ArticlesCitations extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_citations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['article_id'], 'required'],
            [['title'], 'required'],
            [['article_id'], 'integer'],
            [['title', 'class'], 'string', 'max' => 255],
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
            'title' => 'Описание',
            'class' => 'Категория',
        ];

    } // end function



    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        if ($insert) {

        } else {

        }

    } // end function



    /**
     * @inheritdoc
     * @return CitQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new CitQuery(get_called_class());

    } // end function

} // end class
