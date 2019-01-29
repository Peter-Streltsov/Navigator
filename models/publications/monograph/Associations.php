<?php

namespace app\models\publications\monograph;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monograph_associations";
 * Table contains linked data for Monograph; (one-to-many; associated organisations);
 *
 * @property int $id
 * @property string $name
 * @property int $monograph_id
 * @property string $type
 */
class Associations extends ActiveRecord implements LinkedRecordsInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_associations';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'monograph_id'], 'required'],
            [['monograph_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название организации',
            'monograph_id' => 'Идентификатор публикации',
            'type' => '',
        ];
    } // end function


    /**
     * @return string
     */
    public function getErrorsMessage()
    {
        $message = [];
        $errors = $this->getErrors();
        foreach ($errors as $key => $error) {
            $text = '';
            foreach ($error as $message) {
                $text = $text . $message . ' ';
            }
            $message[] = 'Поле "' . $key . '" => ' . $text;
        }
        return implode('<br>', $message);
    } // end function


    /**
     * @inheritdoc
     * @return AssociationsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new AssociationsQuery(get_called_class());
    } // end function

} // end class
