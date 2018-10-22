<?php

namespace app\models\units\monograph;

use app\interfaces\UnitInterface;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "monograph";
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property int $year
 * @property string $doi
 * @property resource $file
 */
class Monograph extends ActiveRecord implements UnitInterface
{

    /**
     * @return array
     */
    public function behaviors()
    {

        return [
            //'class' => TimestampBehavior::className(),
            //'updatedAtAttribute' => false
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographs';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'year'], 'required'],
            [['year'], 'integer'],
            [['file'], 'string'],
            [['title', 'subtitle', 'isbn'], 'string', 'max' => 255],
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
            'subtitle' => 'Подзаголовок',
            'year' => 'Год издания',
            'publisher' => 'Издатель',
            'class' => 'Категория',
            'isbn' => 'ISBN',
            'file' => 'Файл',
            'authors' => 'Авторы'
        ];

    } // end function



    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Монография добавлена');
        } else {
            Yii::$app->session->setFlash('success', 'Данные монографии обновлены');
        }

    } // end function



    /**
     * @return array|\yii\db\ActiveQuery
     */
    public function authors()
    {
<<<<<<< HEAD
        return $this->hasMany(Authors::className(), ['monograph_id' => $this->id]);
=======
        return $this->hasMany(Authors::className(), ['monography_id' => $this->id]);
>>>>>>> 9802b4dd64f5f193e48a6eb8d5091b0b0a84d5b9
    } // end function



    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['monograph_id' => $this->id]);
    }



    /**
     * @return int|void
     */
    public function index()
    {
        // TODO: Implement index() method.
    } // end function



    /**
     * @return string|void
     */
    public function languageValue()
    {
        // TODO: Implement languageValue() method.
    } // end function



    /**
     * @return int|void
     */
    public function personalIndex()
    {
        // TODO: Implement personalIndex() method.
    } // end function


    /**
     * @inheritdoc
     * @return MonographQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new MonographQuery(get_called_class());

    } // end function

} // end class
