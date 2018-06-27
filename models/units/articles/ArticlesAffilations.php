<?php

namespace app\models\units\articles;

use app\models\units\articles\ArticlesAffilationsQuery;

/**
 * This is the model class for table "affilations".
 *
 * @property int $id
 * @property string $name
 * @property int $article_id
 * @property string $type
 */
class ArticlesAffilations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_affilations';
    }

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
    }

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
    }

    /**
     * @inheritdoc
     * @return ArticlesAffilationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesAffilationsQuery(get_called_class());
    }
}
