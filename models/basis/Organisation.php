<?php

namespace app\models\basis;

use Yii;

/**
 * ActiveRecord class for table "organisation";
 *
 * @property int $id
 * @property string $organisation
 * @property string $weblink
 * @property string $first_page_message
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
            [['first_page_message'], 'text']
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
            'first_page_message' => 'Сообщение на главной странице'
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
