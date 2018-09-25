<?php

namespace app\models\units\articles\conferences;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "affilations".
 *
 * @property int $id
 * @property string $name
 * @property int $article_id
 * @property string $type
 */
class Affilations extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles_affilations';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['name', 'article_id'], 'required'],
            [['article_id'], 'integer'],
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
            'name' => '',
            'article_id' => 'Article ID',
            'type' => 'Type',
        ];

    } // end function



    /**
     * @inheritdoc
     * @return AffilationsQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new AffilationsQuery(get_called_class());

    } // end function

} // end class
