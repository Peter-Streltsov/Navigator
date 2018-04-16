<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "upload_categories".
 *
 * @property int $id
 * @property string $class
 */
class UploadCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class'], 'required'],
            [['class'], 'string'],
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
        ];
    }

    /**
     * @inheritdoc
     * @return UploadCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UploadCategoriesQuery(get_called_class());
    }
}
