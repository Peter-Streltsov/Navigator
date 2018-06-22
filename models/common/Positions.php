<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id
 * @property string $position
 */
class Positions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position'], 'required'],
            [['position'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Должность',
        ];
    }

    /**
     * @inheritdoc
     * @return PositionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PositionsQuery(get_called_class());
    }
}
