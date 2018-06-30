<?php

namespace app\models\units\dissertations;

use Yii;

/**
 * This is the model class for table "dissertation_types".
 *
 * @property int $id
 * @property string $type
 */
class DissertationTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dissertation_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return DissertationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DissertationTypesQuery(get_called_class());
    }
}
