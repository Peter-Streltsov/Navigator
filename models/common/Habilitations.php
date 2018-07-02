<?php

namespace app\models\common;

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
            [['habilitation'], 'required'],
            [['habilitation'], 'string', 'max' => 255],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'habilitation' => 'Научная степень',
        ];

    } // end function



    /**
     * @inheritdoc
     * @return HabilitationsQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new HabilitationsQuery(get_called_class());

    } // end function

} // end class
