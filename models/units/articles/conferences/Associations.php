<?php

namespace app\models\units\articles\conferences;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles_conferences_associations";
 *
 * @property int $id
 * @property string $name
 * @property int $article_id
 * @property string $type
 */
class Associations extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_conferences_associations';
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
     * @return AssociationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssociationsQuery(get_called_class());
    } // end function

} // end class
