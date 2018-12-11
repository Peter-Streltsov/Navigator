<?php

namespace app\models\publications\articles\conferences;

// project classes
use app\models\publications\articles\Article;
// yii classes
use yii\db\ActiveRecord;

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
 * @property int $created_at
 * @property int $updated_at
 * @property string $file
 */
class ArticleConference extends Article
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_conferences';
    } // end function


    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
            ],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'conference_collection', 'class'], 'required'],
            [['title', 'section', 'language', 'conference_collection', 'annotation', 'index'], 'string'],
            [['year', 'type', 'created_at', 'updated_at', 'class'], 'integer'],
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
            'conference_collection' => 'Сборник материалов конференции',
            'section' => 'Раздел сборника',
            'year' => 'Год издания',
            'pages' => 'Страницы',
            'number' => 'Номер сборника',
            'language' => 'Язык',
            'annotation' => 'Аннотация',
            'type' => 'Вид',
            'class' => 'Категория ПНРД',
            'index' => 'Текстовый индекс',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
            'file' => 'Файл',
        ];
    } // end function


    /**
     * @inheritdoc
     *
     * @return ArticleConferenceQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new ArticleConferenceQuery(get_called_class());
    } // end function

} // end class
