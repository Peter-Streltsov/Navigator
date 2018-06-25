<?php

namespace app\models\units\articles;

use Yii;

/**
 * This is the model class for table "article_types".
 *
 * @property int $id
 * @property string $type
 */
class ArticleTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_types';
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
     * @return ArticleTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleTypesQuery(get_called_class());
    }
}
