<?php

namespace app\models\units\articles;

use Yii;

/**
 * This is the model class for table "articles_collections".
 *
 * @property int $id
 * @property string $title
 * @property int $type
 * @property string $collection
 * @property string $section
 * @property int $section_number
 * @property int $language
 * @property string $text_index
 * @property string $annotation
 * @property string $link
 * @property string $file
 */
class ArticleCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_collections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'type', 'collection'], 'required'],
            [['title', 'collection', 'section', 'text_index', 'annotation'], 'string'],
            [['type', 'section_number', 'language'], 'integer'],
            [['link', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'collection' => 'Collection',
            'section' => 'Section',
            'section_number' => 'Section Number',
            'language' => 'Language',
            'text_index' => 'Text Index',
            'annotation' => 'Annotation',
            'link' => 'Link',
            'file' => 'File',
        ];
    }

    /**
     * @inheritdoc
     * @return ArticleCollectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleCollectionQuery(get_called_class());
    }
}
