<?php

namespace app\models\units\monograph;

use Yii;

/**
 * This is the model class for table "booktypes".
 *
 * @property int $id
 * @property string $type
 */
class Booktypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booktypes';
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
     * @return BooktypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BooktypesQuery(get_called_class());
    }
}
