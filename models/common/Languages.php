<?php

namespace app\models\common;

use Yii;
use yii\db\ActiveRecord;

/**
 * model class for Languages
 *
 * @property int $id
 * @property string $language
 * @property int $created_at
 */
class Languages extends ActiveRecord
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
            'language' => 'Язык',
        ];

    } // end function



    /**
     * if language exists - will not be saved, else - adds new record
     *
     * @param bool $insert
     * @return bool
     * @throws \yii\db\Exception
     */
    public function beforeSave($insert)
    {

        $this->language = strtolower($this->language);

        if (parent::beforeSave($insert)) {
            if (!Languages::find()->where(['language' => $this->language])->exists()) {
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
