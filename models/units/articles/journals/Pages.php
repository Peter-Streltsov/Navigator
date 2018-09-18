<?php

namespace app\models\units\articles;

use Yii;

/**
 * This is the model class for table "article_pages".
 *
 * @property int $id
 * @property int $article_id
 * @property int $begin_page
 * @property int $end_page
 */
class ArticlePages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'begin_page'], 'required'],
            [['article_id', 'begin_page', 'end_page'], 'integer'],
        ];
    }

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
    }

    /**
     * @inheritdoc
     * @return ArticlePagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlePagesQuery(get_called_class());
    }
}
