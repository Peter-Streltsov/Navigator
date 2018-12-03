<?php

namespace app\models\identity;

use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "accesstokens";
 *
 * @property int $id
 * @property string $token
 */
class Roles extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
        ];
    } // end function


    /**
     * @inheritdoc
     * @return RolesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RolesQuery(get_called_class());
    } // end function

} // end class
