<?php

namespace app\models\units\monograph;

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
class Monograph extends ActiveRecord
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
     * @inheritdoc
     * @return MonographQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new MonographQuery(get_called_class());

    } // end function

} // end class
