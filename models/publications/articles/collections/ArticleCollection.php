<?php

namespace app\models\publications\articles\collections;

// project classes
use app\models\publications\articles\Article;
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
class ArticleCollection extends Article
{

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
            [['title', 'class', 'collection'], 'required'],
            [['title', 'collection', 'section', 'index', 'annotation'], 'string'],
            [['type', 'class', 'created_at', 'updated_at', 'year', 'section_number'], 'integer'],
            [['link', 'language', 'file'], 'string', 'max' => 255],
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
     * @return string|null
     */
    public function getType()
    {
        $type = Types::find()->where(['id' => $this->type])->one();
        return $type == null ? null : $type->type;
    } // end function


    /**
     * @inheritdoc
     * @return ArticleCollectionQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new ArticleCollectionQuery(get_called_class());
    } // end function

} // end class
