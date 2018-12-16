<?php

namespace app\models\identity;

// project classes
use app\models\common\Habilitations;
// yii classes
use app\models\common\Positions;
use Yii;

/**
 * ActiveRecord class for table "personnel";
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
    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname'], 'required'],
            [['employment', 'age', 'user_id'], 'integer'],
            [['name', 'secondname', 'lastname', 'position', 'habilitation', 'expirience'], 'string', 'max' => 255],
        ];
    } // end function



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
            'user_id' => 'user id',
            'habilitation' => 'Ученая степень',
            'year_graduated' => 'Год окончания ВУЗа'
        ];
    } // end function



    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Сотрудник добавлен');
        } else {
            Yii::$app->session->setFlash('success' , 'Данные сотрудника обновлены');
        }
    } // end function


    /**
     * @return string
     */
    public function getPositionValue()
    {
        $position = Positions::find()->where(['id' => $this->position])->one();
        return $position != null ? $position->position : null;
    } // end function


    /**
     * @return mixed
     */
    public function getHabilitationValue()
    {
        $habilitation = Habilitations::find()->where(['id' => $this->habilitation])->one();
        return $habilitation != null ? $habilitation->habilitation : null;
    } // end function


    /**
     * returns Authors model linked to current staff member
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['' => '']);
    } // end function


    /**
     * @inheritdoc
     * @return PersonnelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonnelQuery(get_called_class());
    } // end function

} // end class
