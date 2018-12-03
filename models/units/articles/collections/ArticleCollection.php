<?php

namespace app\models\units\articles\collections;

// project classes
use app\interfaces\UnitInterface;
use app\models\units\articles\Article;
use app\models\units\articles\traits\ArticleQueryTrait;
use app\models\units\articles\traits\SchemeTrait;
use app\models\units\articles\traits\UnitTrait;
// yii classes
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "articles_collections";
 *
 * @property int $id
 * @property int $section_number
 * @property int $language
 * @property int $type
 * @property int $class
 * @property string $title
 * @property string $collection
 * @property string $section
 * @property string $text_index
 * @property string $annotation
 * @property string $link
 * @property string $file
 */
class ArticleCollection extends Article implements UnitInterface
{

    use SchemeTrait;
    use UnitTrait;
    use ArticleQueryTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_collections';
    } // end function


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
            [['title', 'type', 'class', 'collection'], 'required'],
            [['title', 'collection', 'section', 'text_index', 'annotation'], 'string'],
            [['type', 'class', 'created_at', 'updated_at', 'year', 'section_number', 'language'], 'integer'],
            [['link', 'file'], 'string', 'max' => 255],
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
            'type' => 'Вид',
            'class' => 'Категория ПНРД',
            'year' => 'Год издания',
            'collection' => 'Сборник',
            'section' => 'Раздел сборника',
            'section_number' => 'Номер раздела',
            'language' => 'Язык',
            'index' => 'Текстовый индекс',
            'annotation' => 'Аннотация',
            'link' => 'Ссылка',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
            'file' => 'Файл',
        ];
    } // end function


    /**
     * @inheritdoc
     * @return ArticleCollectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleCollectionQuery(get_called_class());
    } // end function

} // end class
