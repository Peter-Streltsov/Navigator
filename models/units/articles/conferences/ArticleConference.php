<?php

namespace app\models\units\articles\conferences;

// project classes
use app\interfaces\UnitInterface;
use app\models\units\articles\Article;

/**
 * ActiveRecord model class for table "articles_conferences";
 *
 * @property int $id
 * @property int $language
 * @property int $type
 * @property int $class
 * @property string $title
 * @property string $conference_collection
 * @property string $number
 * @property string $annotation
 * @property string $text_index
 * @property string $file
 */
class ArticleConference extends Article implements UnitInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_conferences';
    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'conference_collection', 'type', 'class'], 'required'],
            [['title', 'section', 'language', 'conference_collection', 'annotation', 'index'], 'string'],
            [['year', 'type', 'class'], 'integer'],
            [['number', 'file'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'conferency_collection' => 'Сборник материалов конференции',
            'section' => 'Раздел сборника',
            'year' => 'Год издания',
            'pages' => 'Страницы',
            'number' => 'Номер сборника',
            'language' => 'Язык',
            'annotation' => 'Аннотация',
            'type' => 'Категория ПНРД',
            'index' => 'Текстовый индекс',
            'file' => 'Файл',
        ];
    } // end function


    /**
     * @inheritdoc
     *
     * @return ArticleConferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleConferenceQuery(get_called_class());
    } // end function

} // end class
