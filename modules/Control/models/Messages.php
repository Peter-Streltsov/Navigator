<?php

namespace app\modules\Control\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "messages".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property int $created_at
 * @property string $category
 * @property string $custom_theme
 * @property string $text
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }


    public function behaviors()
    {

        return [
            'class' => TimestampBehavior::className(),
            //'updatedAtAttribute' => false
        ];

    } // end function

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['username', 'category', 'text'], 'required'],
            [['text'], 'string'],
            [['username', 'category', 'custom_theme'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID пользователя',
            'username' => 'Пользователь',
            'created_at' => 'Создано',
            'category' => 'Категория',
            'custom_theme' => 'Тема сообщения',
            'text' => 'Текст сообщения',
        ];
    }

    /**
     * @inheritdoc
     * @return MessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessagesQuery(get_called_class());
    }
}
