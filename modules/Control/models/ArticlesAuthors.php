<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "articles_authors".
 *
 * @property int $id
 * @property int $article_id
 * @property int $author_id
 *
 * @property Articles $article
 */
class ArticlesAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'author_id'], 'required'],
            [['article_id', 'author_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getArticle()
    {

        return $this->hasOne(Articles::className(), ['id' => 'article_id']);

    } // end function*/


    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getAuthors()
    {

        return $this->hasMany(Authors::className(), ['id', 'author_id']);

    } // end function*/



    /**
     * @inheritdoc
     * @return ArticlesAuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesAuthorsQuery(get_called_class());
    }
}
