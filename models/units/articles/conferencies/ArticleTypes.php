<?php

namespace app\models\units\articles\conferencies;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles_conferencies_types".
 *
 * @property int $id
 * @property string $type
 */
class ArticleTypes extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles_conferencies_types';

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
     * @return ArticlesConferenciesTypesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticlesConferenciesTypesQuery(get_called_class());

    } // end function

} // end class
