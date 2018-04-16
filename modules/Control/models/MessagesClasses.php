<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "messages_classes".
 *
 * @property int $id
 * @property string $class
 */
class MessagesClasses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages_classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class'], 'required'],
            [['class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
        ];
    }

    /**
     * @inheritdoc
     * @return MessagesClassesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessagesClassesQuery(get_called_class());
    }
}
