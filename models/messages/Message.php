<?php

namespace app\models\messages;

// yii classes
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * ActiveRecord class for table "messages";
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property int $created_at
 * @property string $category
 * @property string $custom_theme
 * @property string $text
 */
class Message extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    } // end function


    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    ActiveRecord::EVENT_BEFORE_UPDATE => false,
                ],
            ],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'integer'],
            [['user_id', 'username', 'category', 'text'], 'required'],
            [['text'], 'string'],
            [['username', 'category', 'custom_theme'], 'string', 'max' => 255],
        ];
    } // end function



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
    } // end function


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Сообщение отправлено');
        } else {
            Yii::$app->session->setFlash('danger', 'Не далось отправить сообщение');
        }
    } // end function


    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    } // end function

} // end class
