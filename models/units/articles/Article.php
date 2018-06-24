<?php

namespace app\models\units\articles;

use Yii;

/**
 * ActiveRecord class for table "articles".
 *
 * @property int $id
 * @property int $type
 * @property string $title
 * @property string $magazine
 * @property int $number
 * @property int $direct_number
 * @property int $pages
 * @property int $year
 * @property string $language
 * @property string $doi
 * @property int $created_at
 * @property string $annotaion
 * @property string $index
 * @property string $link
 * @property resource $file
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['type', 'title', 'number', 'year', 'language'], 'required'],
            [['type', 'number', 'direct_number', 'pages', 'year', 'created_at'], 'integer'],
            [['title', 'annotaion', 'index', 'file'], 'string'],
            [['magazine', 'language', 'doi', 'link'], 'string', 'max' => 255],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'type' => 'Тип',
            'title' => 'Заголовок',
            'magazine' => 'Журнал',
            'number' => 'Номер',
            'direct_number' => 'Сквозной номер',
            'pages' => 'Страницы',
            'year' => 'Год',
            'language' => 'Язык',
            'doi' => 'ЦИО',
            'created_at' => 'Created At',
            'annotaion' => 'Аннотация',
            'index' => 'Полнотекстовый индекс',
            'link' => 'Ссылка',
            'file' => 'Файл',
        ];

    } // end function



    // GETTERS


    /**
     * TODO: complete
     */
    public function getType()
    {

        //return $this->hasOne(ArticleTypes::className(), []);

    } // end function
    


    /**
     * TODO: complete
     */
    public function getPages()
    {

    }


    /**
     * TODO: complete
     */
    public function getPagesNumber()
    {

    }



    /**
     * TODO: complete
     */
    public function getAuthors()
    {

        //$this->hasMany();

    } // end function



    // END GETTERS



    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticleQuery(get_called_class());

    } // end function

} // end class
