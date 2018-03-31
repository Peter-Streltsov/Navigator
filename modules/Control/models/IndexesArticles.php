<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "indexes_articles".
 *
 * @property int $id
 * @property string $description
 * @property double $value
 *
 * @property Articles[] $articles
 */
class IndexesArticles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indexes_articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'value'], 'required'],
            [['description'], 'string'],
            [['value'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание',
            'value' => 'Значение индекса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['class' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesQuery(get_called_class());
    }
}
