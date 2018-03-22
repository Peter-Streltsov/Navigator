<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $publisher
 * @property int $year
 * @property string $doi
 * @property resource $file
 *
 * @property ArticlesAuthors[] $articlesAuthors
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'year'], 'required'],
            [['year'], 'integer'],
            [['file'], 'string'],
            [['title', 'subtitle', 'publisher', 'doi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'publisher' => 'Издатель',
            'year' => 'Год издания',
            'doi' => 'ЦИО',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesAuthors()
    {
        return $this->hasMany(ArticlesAuthors::className(), ['article_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesQuery(get_called_class());
    }
}
