<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "citation_classes".
 *
 * @property int $id
 * @property string $class
 * @property int $value
 */
class CitationClasses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'citation_classes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'value'], 'required'],
            [['value'], 'integer'],
            [['class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'value' => 'Value',
        ];
    }

    /**
     * @inheritdoc
     * @return CitationClassesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitationClassesQuery(get_called_class());
    }
}
