<?php

namespace app\models\units\monograph;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "monograph_affilations".
 *
 * @property int $id
 * @property string $name
 * @property int $monograph_id
 * @property string $type
 */
class MonographAffilations extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_affilations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'monograph_id'], 'required'],
            [['monograph_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'monograph_id' => 'Monograph ID',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return MonographAffilationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonographAffilationsQuery(get_called_class());
    }
}
