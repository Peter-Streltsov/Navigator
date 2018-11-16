<?php

namespace app\models\basis;

// project classes
use app\models\identity\Users;
// yii classes
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
     * attaching timestamp behavior - 'created_at' only
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
    public static function tableName()
    {
        return 'telemetry';
    } // end function


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
            'browser' => 'Клиент',
            'path' => 'Запрошенный путь',
            'created_at' => 'Время',
        ];
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsermodel()
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
