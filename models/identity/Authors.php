<?php

namespace app\models\identity;

use Yii;

/**
 * This is the model class for table "authors.php".
 *
 * @property int $id
 * @property string $name
 * @property string $secondname
 * @property string $lastname
 */
class Authors extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'authors';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['name', 'lastname'], 'required'],
            [['name', 'secondname', 'lastname'], 'string', 'max' => 255],
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
            'habilitation' => 'Ученая степень'
        ];

    } // end function



    /**
     * GETTERS
     */

    public function getAuthorhabilitation()
    {

    }


    public function getPublications()
    {

    }

    /**
     * ENDGETTERS
     */



    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Автор добавлен');
        } else {
            Yii::$app->session->setFlash('danger', 'Данные автора обновлены');
        }

    } // end function




    /**
     * @inheritdoc
     * @return AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new AuthorsQuery(get_called_class());

    } // end function

} // end class
