<?php

namespace app\models\units\articles\conferencies;

use app\interfaces\UnitInterface;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles_conferencies".
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
class Article extends ActiveRecord implements UnitInterface
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



    public function getAuthors()
    {
        // TODO: Implement getUnitauthors() method.
    }



    public function getIndex()
    {
        // TODO: Implement getPnrdindex() method.
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
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticleQuery(get_called_class());

    } // end function

} // end class
