<?php

namespace app\models\publications;

use yii\db\ActiveRecord;


/**
 * ActiveRecord class for table "citation_classes";
 *
 * @property int $id
 * @property string $class
 * @property int $value
 */
class CitationClasses extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'citation_classes';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class', 'value'], 'required'],
            [['value'], 'integer'],
            [['class'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'value' => 'Value',
        ];
    } // end function


    /**
     * @inheritdoc
     * @return CitationClassesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CitationClassesQuery(get_called_class());
    } // end function

} // end class
