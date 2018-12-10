<?php

namespace app\models\publications\monograph;

use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monographies_citations";
 * Table contains linked data for Monograph; (one-to-many; citation descriptions);
 *
 * @property int $id
 * @property string $publisher
 * @property string $title
 * @property string $class
 */
class Citations extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographies_citations';
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
     * @inheritdoc
     * @return MonographiesCitationsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new MonographiesCitationsQuery(get_called_class());
    } // end function

} // end class
