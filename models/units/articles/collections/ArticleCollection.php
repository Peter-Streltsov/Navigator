<?php

namespace app\models\units\articles\collections;

// project classes
use app\interfaces\UnitInterface;
// yii2 classes
use Yii;
use yii\db\ActiveRecord;

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
class ArticleCollection extends ActiveRecord implements UnitInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles_collections';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'type', 'collection'], 'required'],
            [['title', 'collection', 'section', 'text_index', 'annotation'], 'string'],
            [['type', 'year', 'section_number', 'language'], 'integer'],
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
            'year' => 'Год издания',
            'collection' => 'Сборник',
            'section' => 'Раздел сборника',
            'section_number' => 'Номер раздела',
            'language' => 'Язык',
            'text_index' => 'Текстовый индекс',
            'annotation' => 'Аннотация',
            'link' => 'Ссылка',
            'file' => 'Файл',
        ];

    } // end function


    /**
     * GETTERS
     */


    /**
     *
     */
    public function getAuthors()
    {
        // TODO: Implement getUnitauthors() method.
    }


    /**
     *
     */
    public function getLanguage()
    {
        // TODO: Implement getUnitlanguage() method
    }



    /**
     *
     */
    public function getIndex()
    {
        // TODO: Implement getPnrdindex() method
    }


    public function getPersonalIndex()
    {
        // TODO: Implement getPersonalIndex() method.
    }

    /**
     * END GETTERS
     */



    /**
     * @inheritdoc
     * @return ArticleCollectionQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticleCollectionQuery(get_called_class());

    } // end function

} // end class
