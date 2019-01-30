<?php

namespace app\models\publications\dissertations;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "dissertations_citations";
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
        return 'dissertations_citations';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publisher', 'monography_id', 'title', 'class'], 'required'],
            [['monography_id'], 'integer'],
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
            'publisher' => 'Издатель',
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
     * @return CitationsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new CitationsQuery(get_called_class());
    } // end function

} // end class
