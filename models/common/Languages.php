<?php

namespace app\models\common;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "languages".
 *
 * @property int $id
 * @property string $language
 * @property int $created_at
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'languages';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['language'], 'required'],
            [['created_at'], 'integer'],
            [['language'], 'string', 'max' => 255],
        ];

    } // end function


    /**
     *
     * @return array
     */
    public function behaviors()
    {

        return [
            //TimestampBehavior::className(),
            //'attributes' => [
//                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
  //          ]
            //'updatedAtAttribute' => 'false'
        ];

    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'language' => 'Язык',
            'created_at' => 'Created At',
        ];

    } // end function



    /**
     * if language exists - will not be saved, else - adds new record
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                Yii::$app->session->setFlash('warning', 'Список языков обновлен');
                return true;
            } else {
                return false;
            }
        }

    } // end function



    /**
     * @inheritdoc
     * @return LanguagesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new LanguagesQuery(get_called_class());

    } // end function

} // end class
