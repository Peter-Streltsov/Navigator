<?php

namespace app\models\messages;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "messages_classes".
 *
 * @property int $id
 * @property string $class
 */
class MessageClasses extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'messages_classes';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['class'], 'required'],
            [['class'], 'string', 'max' => 255],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'class' => 'Class',
        ];

    } // end function



    /**
     * @inheritdoc
     * @return MessageClassesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new MessageClassesQuery(get_called_class());

    } // end function

} // end class
