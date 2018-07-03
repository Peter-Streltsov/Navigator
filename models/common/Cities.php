<?php

namespace app\models\common;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $city
 */
class Cities extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'cities';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['city'], 'required'],
            [['city'], 'string', 'max' => 255],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'city' => 'City',
        ];

    } // end function



    /**
     *
     *
     * @param bool $insert
     * @return bool
     * @throws \yii\db\Exception
     */
    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            if (!Cities::find()->where(['city' => $this->city])->exists()) {
                Yii::$app->session->setFlash('warning', 'Список городов обновлен');
                return true;
            } else {
                return false;
            }
        }

    } // end function



    /**
     * @inheritdoc
     * @return CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new CitiesQuery(get_called_class());

    } // end function

} // end class
