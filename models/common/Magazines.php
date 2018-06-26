<?php

namespace app\models\common;

use Yii;

/**
 * This is the model class for table "magazines".
 *
 * @property int $id
 * @property string $magazine
 * @property int $created_at
 */
class Magazines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'magazines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['magazine'], 'required'],
            [['created_at'], 'integer'],
            [['magazine'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'magazine' => 'Magazine',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @inheritdoc
     * @return MagazinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MagazinesQuery(get_called_class());
    }
}
