<?php

namespace app\models\basis;

use Yii;

/**
 * This is the model class for table "organisation".
 *
 * @property int $id
 * @property string $organisation
 * @property string $weblink
 */
class Organisation extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'organisation';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['organisation'], 'required'],
            [['organisation', 'weblink'], 'string', 'max' => 255],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'organisation' => 'Название организации',
            'weblink' => 'Ссылка',
        ];

    } // end function


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);

        if (!$insert) {
            Yii::$app->session->setFlash('success' , 'Данные организации обновлены');
        }

    } // end function



    /**
     * @inheritdoc
     * @return OrganisationQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new OrganisationQuery(get_called_class());

    } // end function

} // end class
