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
            [['employment', 'age'], 'integer'],
            [['name', 'secondname', 'lastname', 'position', 'expirience'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'secondname' => 'Отчество',
            'lastname' => 'Фамилия',
            'position' => 'Должность',
            'employment' => 'Стаж',
            'expirience' => 'Предыдущий стаж',
            'age' => 'Возраст',
            'year_graduated' => 'Год окончания ВУЗа'
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
