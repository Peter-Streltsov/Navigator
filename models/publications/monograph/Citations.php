<?php

namespace app\models\publications\monograph;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monograph_citations";
 * Table contains linked data for Monograph; (one-to-many; citation descriptions);
 *
 * @property int $id
 * @property string $publisher
 * @property string $title
 * @property string $class
 */
class Citations extends ActiveRecord implements LinkedRecordsInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_citations';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publisher', 'monograph_id', 'title', 'class'], 'required'],
            [['monograph_id'], 'integer'],
            [['publisher', 'title', 'class'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monograph_id' => 'ID монографии',
            'title' => 'Описание',
            'class' => 'Категория',
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
     * @return CitationsQuery -  active query used by this AR class;
     */
    public static function find()
    {
        return new CitationsQuery(get_called_class());
    } // end function

} // end class
