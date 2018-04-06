<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "accesstokens".
 *
 * @property int $id
 * @property string $token
 */
class Accesstokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesstokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
        ];
    }

    /**
     * @inheritdoc
     * @return AccesstokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccesstokensQuery(get_called_class());
    }
}
