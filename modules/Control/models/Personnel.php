<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "personnel".
 *
 * @property int $id
 * @property string $name
 * @property string $secondname
 * @property string $lastname
 * @property int $position
 * @property int $employment
 * @property string $expirience
 * @property int $age
 */
class Personnel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personnel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'position', 'employment', 'age'], 'required'],
            [['position', 'employment', 'age'], 'integer'],
            [['name', 'secondname', 'lastname', 'expirience'], 'string', 'max' => 255],
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
            'secondname' => 'Secondname',
            'lastname' => 'Lastname',
            'position' => 'Position',
            'employment' => 'Employment',
            'expirience' => 'Expirience',
            'age' => 'Age',
        ];
    }

    /**
     * @inheritdoc
     * @return PersonnelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonnelQuery(get_called_class());
    }
}
