<?php

namespace app\models\common;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $department
 */
class Departments extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department'], 'required'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'Department',
        ];
    }

    /**
     * @inheritdoc
     * @return DepartmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentsQuery(get_called_class());
    }
}
