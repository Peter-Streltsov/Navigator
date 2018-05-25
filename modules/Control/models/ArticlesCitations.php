<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "articles_citations".
 *
 * @property int $id
 * @property int $article_id
 * @property string $title
 * @property string $class
 */
class ArticlesCitations extends \yii\db\ActiveRecord
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
            [['article_id'], 'integer'],
            [['title', 'class'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'class' => 'Class',
        ];
    }

    /**
     * @inheritdoc
     * @return CitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitQuery(get_called_class());
    }
}
