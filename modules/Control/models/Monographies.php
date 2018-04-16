<?php

namespace app\modules\Control\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "monographies".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property int $year
 * @property string $doi
 * @property resource $file
 */
class Monographies extends \yii\db\ActiveRecord
{

    /**
     * @return array
     */
    public function behaviors()
    {

        return [
            'class' => TimestampBehavior::className(),
            'updatedAtAttribute' => false
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographies';
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
            [['title', 'subtitle', 'doi'], 'string', 'max' => 255],
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
            'subtitle' => 'Подзаголовок',
            'year' => 'Год издания',
            'doi' => 'ЦИО',
            'file' => 'File',
        ];
    }

    /**
     * @inheritdoc
     * @return MonographiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonographiesQuery(get_called_class());
    }
}
