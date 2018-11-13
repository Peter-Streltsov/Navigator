<?php

namespace app\models\basis;

use app\models\identity\Users;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "telemetry";
 *
 * @property int $id
 * @property int $user
 * @property string $ip
 * @property string $browser
 * @property string $path
 * @property int $created_at
 */
class Telemetry extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'telemetry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user'], 'integer'],
            [['created_at'], 'integer'],
            [['ip', 'browser', 'path'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'ip' => 'Ip',
            'browser' => 'Browser',
            'path' => 'Path',
            'created_at' => 'Created At',
        ];
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user']);
    } // end function

    /**
     * @inheritdoc
     * @return TelemetryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelemetryQuery(get_called_class());
    } // end function

} // end class
