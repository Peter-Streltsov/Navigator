<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property string $from
 * @property int $read
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'user_id'], 'required'],
            [['text'], 'string'],
            [['user_id', 'read'], 'integer'],
            [['from'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текст сообщения',
            'user_id' => 'User ID',
            'from' => 'Отправитель',
            'read' => 'Read',
        ];
    }

    /**
     * @inheritdoc
     * @return NotificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationsQuery(get_called_class());
    }
}
