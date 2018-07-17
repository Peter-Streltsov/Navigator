<?php

namespace app\models\units\articles;

use Yii;

/**
 * This is the model class for table "articles_conferencies_types".
 *
 * @property int $id
 * @property string $type
 */
class ArticlesConferenciesTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_conferencies_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * @inheritdoc
     * @return ArticlesConferenciesTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesConferenciesTypesQuery(get_called_class());
    }
}
