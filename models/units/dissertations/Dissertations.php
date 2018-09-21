<?php

namespace app\models\units\dissertations;

use app\interfaces\UnitInterface;
use app\models\common\Habilitations;
use app\modules\Control\models\Authors;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dissertations".
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
 * @property string $file
 */
class Dissertations extends ActiveRecord implements UnitInterface
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
            [['type', 'year', 'habilitation', 'pages_number', 'author'], 'integer'],
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
            'file' => 'Файл',
        ];

    } // end function


    /**
     * GETTERS
     */



    public function authors()
    {
        // TODO: Implement getUnitauthors() method;
    }



    public function languageValue()
    {
        // TODO: Implement getUnitlanguage() method;
    }


    /**
     * TODO: complete method (needs model for dissertation indexes)
     *
     * @return integer
     */
    public function index()
    {
        //TODO: Implement getIndex() method;
        return 1;
    }



    /**
     * @return float|int
     */
    public function personalIndex()
    {
        // TODO: Implement getPersonalIndex() method;
        return $this->getIndex() * 0.3;
    }

    /**
     * gets current dissertation type
     *
     * @return \DissertationTypes
     */
    public function getDissertationtype()
    {

        return $this->hasOne(DissertationTypes::className(), ['id' => 'type']);

    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDissertationhabilitation()
    {

        return $this->hasOne(Habilitations::className(), ['id' => 'habilitation']);

    } // end function



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDissertationauthor()
    {

        return $this->hasOne(Authors::className(), ['id' => 'author']);

    } // end function



    /**
     * ENDGETTERS
     */



    /**
     * @inheritdoc
     * @return DissertationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new DissertationTypesQuery(get_called_class());

    } // end function

} // end class
