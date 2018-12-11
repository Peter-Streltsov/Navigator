<?php

namespace app\models\publications\monograph;

use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monograph_types";
 * Table contains linked data for Monograph; (one-to-one; monograph type);
 * Provides publication types for Monograph models;
 *
 * @property int $id
 * @property string $type
 */
class Types extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_types';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    } // end function


    /**
     * @inheritdoc
     * @return TypesQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new TypesQuery(get_called_class());
    } // end function

} // end class
