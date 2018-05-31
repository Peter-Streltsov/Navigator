<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "monographies_citations".
 *
 * @property int $id
 * @property string $publisher
 * @property string $title
 * @property string $class
 */
class MonographiesCitations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographies_citations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publisher', 'title', 'class'], 'required'],
            [['publisher', 'title', 'class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'publisher' => 'Publisher',
            'title' => 'Title',
            'class' => 'Class',
        ];
    }

    /**
     * @inheritdoc
     * @return MonographiesCitationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonographiesCitationsQuery(get_called_class());
    }
}
