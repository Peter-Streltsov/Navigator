<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "editions".
 *
 * @property int $id
 * @property string $chiefeditor
 * @property string $editor
 * @property double $volume
 */
class Editions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'editions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['volume'], 'number'],
            [['chiefeditor', 'editor'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chiefeditor' => 'Ответственный редактор',
            'editor' => 'Редактор',
            'volume' => 'Объем (в авторских листах)',
        ];
    }

    /**
     * @inheritdoc
     * @return EditionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EditionsQuery(get_called_class());
    }
}
