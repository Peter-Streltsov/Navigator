<?php

namespace app\models\publications\dissertations;

use app\interfaces\PublicationInterface;
use app\models\common\Habilitations;
use app\models\common\Languages;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "dissertations";
 *
 * @property int $id
 * @property int $type
 * @property string $title
 * @property int $year
 * @property string $city
 * @property int $habilitation
 * @property string $organisation
 * @property string $speciality
 * @property int $pages_number
 * @property string $language
 * @property string $state_registration
 * @property int $author
 * @property string $annotation
 * @property string $link
 * @property string $index
 * @property int $created_at
 * @property int $updated_at
 * @property string $file
 */
class Dissertations extends ActiveRecord implements PublicationInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dissertations';
    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'year', 'city', 'habilitation', 'speciality', 'author'], 'required'],
            [['type', 'year', 'created_at', 'updated_at', 'habilitation', 'pages_number', 'author'], 'integer'],
            [['annotation', 'index'], 'string'],
            [['title', 'city', 'organisation', 'speciality', 'language', 'state_registration', 'link', 'file'], 'string', 'max' => 255],
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
            'year' => 'Год защиты',
            'city' => 'Город',
            'habilitation' => 'Ученая степень',
            'organisation' => 'Организация',
            'speciality' => 'Специальность',
            'pages_number' => 'Количество страниц',
            'language' => 'Язык',
            'state_registration' => 'Номер государственной регистрации',
            'author' => 'Автор',
            'annotation' => 'Аннотация',
            'link' => 'Ссылка на сетевой ресурс',
            'index' => 'Полнотекстовый индекс',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
            'file' => 'Файл',
        ];
    } // end function


    /**
     * GETTERS
     */


    public function getAuthors()
    {
        // TODO: Implement getUnitauthors() method;
    }


    /**
     * @return mixed|string|null
     */
    public function getLanguageValue()
    {
        $language = Languages::find()->where(['id' => $this->language])->one();
        return $language != null ? $language->language : null;
    } // end function


    /**
     * TODO: complete method (needs model for dissertation indexes)
     *
     * @return integer
     */
    public function getIndex()
    {
        //TODO: Implement getIndex() method;
        return 1;
    }



    /**
     * @return float|int
     */
    public function getPersonalIndex()
    {
        // TODO: Implement getPersonalIndex() method;
        return $this->getIndex() * 0.3;
    }

    /**
     * gets current dissertation type
     *
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(DissertationTypes::className(), ['id' => 'type']);
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHabilitation()
    {
        return $this->hasOne(Habilitations::className(), ['id' => 'habilitation']);
    } // end function


    /**
     * TODO: replace index with actual values!!!
     *
     * @param $author_id
     * @return float|int
     */
    public function getIndexByAuthor($author_id)
    {
        $index_value = 1;
        $part = 100;
        return ($part * $index_value) / 100;
    } // end function


    /**
     * ENDGETTERS
     */



    /**
     * @inheritdoc
     * @return DissertationTypesQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new DissertationTypesQuery(get_called_class());
    } // end function

} // end class
