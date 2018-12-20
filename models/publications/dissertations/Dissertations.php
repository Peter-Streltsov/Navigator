<?php

namespace app\models\publications\dissertations;

// project classes
use app\interfaces\PNRDInterface;
use app\interfaces\PublicationInterface;
use app\models\common\Habilitations;
use app\models\common\Languages;
use app\models\publications\monograph\Authors;
use app\models\publications\Publication;
// yii classes
use yii\db\ActiveQuery;

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
class Dissertations extends Publication implements PublicationInterface, PNRDInterface
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

    /**
     * redefined from basic class
     * @return ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => $this->author]);
    } // end function


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
     * @return float
     */
    public function getIndex()
    {
        //TODO: Implement getIndex() method;
        return 1.0;
    } // end function


    /**
     * equal to getIndex() method - Dissertations can have only one author
     *
     * @return float
     */
    public function getPersonalIndex()
    {
        return $this->getIndex();
    } // end function


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
     * returns value for current habilitation level (from Habilitations model);
     *
     * @return string
     */
    public function getHabilitationValue()
    {
        return Habilitations::find()->where(['id' => $this->habilitation])->one()->habilitation;
    } // end function


    /**
     *
     *
     * @return float
     */
    public function getIndexValue()
    {
        return 1.0;
    } // end function


    /**
     * calculates index for exact author
     *
     * @return float
     */
    public function getIndexByAuthor($author_id = null)
    {
        return 1.0;
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
