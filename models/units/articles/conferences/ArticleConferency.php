<?php

namespace app\models\units\articles\conferences;

// project classes
use app\interfaces\UnitInterface;
use app\models\units\articles\Article;

/**
 * ActiveRecord model class for table "articles_conferencies";
 *
 * @property int $id
 * @property string $title
 * @property string $conferency_collection
 * @property string $number
 * @property int $language
 * @property string $annotation
 * @property string $text_index
 * @property string $file
 */
class ArticleConferency extends Article implements UnitInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles_conferencies';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'conferency_collection'], 'required'],
            [['title', 'section', 'conferency_collection', 'annotation', 'text_index'], 'string'],
            [['language'], 'integer'],
            [['number', 'file'], 'string', 'max' => 255],
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
            'conferency_collection' => 'Сборник материалов конференции',
            'section' => 'Раздел сборника',
            'year' => 'Год издания',
            'pages' => 'Страницы',
            'number' => 'Номер сборника',
            'language' => 'Язык',
            'annotation' => 'Аннотация',
            'text_index' => 'Текстовый индекс',
            'file' => 'Файл',
        ];

    } // end function




    /**
     * @inheritdoc
     *
     * @return ArticleConferencyQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticleConferencyQuery(get_called_class());

    } // end function

} // end class
