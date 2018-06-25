<?php

namespace app\models\pnrd\indexes;

use yii\db\ActiveRecord;
use app\models\units\articles\Article;
use app\models\units\articles\ArticleQuery;

/**
 * This is the model class for table "indexes_articles".
 *
 * @property int $id
 * @property string $description
 * @property double $value
 *
 * @property Articles[] $articles
 */
class IndexesArticles extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'indexes_articles';

    } // end function



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

    } // end function



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

    } // end function



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {

        return $this->hasMany(Article::className(), ['class' => 'id']);

    } // end function



    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticleQuery(get_called_class());

    } // end function

} // end class
