<?php

namespace app\models\units\articles\conferencies;

use app\interfaces\UnitInterface;
use app\models\units\articles\traits\ArticleQueryTrait;
use app\models\units\articles\traits\SchemeTrait;
use app\models\units\articles\traits\UnitTrait;
use yii\db\ActiveRecord;

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
class ArticleConferency extends ActiveRecord implements UnitInterface
{

    use SchemeTrait;
    use UnitTrait;
    use ArticleQueryTrait;

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
     * GETTERS
     */



    /**
     * return string value of current article language
     *
     * @return string
     */
    public function getLanguage()
    {

    }



    /**
     * @return array|void
     */
    public function getAuthors()
    {
        // TODO: Implement getUnitauthors() method.
    }



    /**
     * @return int|void
     */
    public function getIndex()
    {
        // TODO: Implement getPnrdindex() method.
    }



    /**
     * @return int|void
     */
    public function getPersonalIndex()
    {
        // TODO: Implement getPersonalIndex() method.
    }



    /**
     * END GETTERS
     */



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
