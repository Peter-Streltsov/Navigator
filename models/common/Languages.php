<?php

namespace app\models\common;

use Yii;

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
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'language' => 'Language',
            'created_at' => 'Created At',
        ];

    } // end function


    /**
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {

        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                return false;
            } else {
                return true;
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
