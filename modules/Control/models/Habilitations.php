<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "habilitations".
 *
 * @property int $id
 * @property string $habilitation
 */
class Habilitations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'habilitations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['habilitation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'habilitation' => 'Habilitation',
        ];
    }
}
