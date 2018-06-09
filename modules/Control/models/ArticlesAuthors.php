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

    } // end function



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

    } // end function



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

    } // end function



    public function getArticlesbyauthor()
    {

        return $this->hasMany(Articles::className(), ['id' => 'article_id']);

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
    public function getArticlesbyid()
    {

        return $this->hasMany(Articles::className(), ['id', 'author_id']);

    } // end function



    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {

        if (ArticlesAuthors::find()->where(['author_id' => $this->author_id, 'article_id' => $this->article_id])->exists()) {
            Yii::$app->session->setFlash('warning', 'Автор с таким id уже сопоставлен статье');
            return false;
        } else {
            return true;
        }

    } // end function



    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        Yii::$app->session->setFlash('info', 'Автор добавлен');

    } // end function



    public function afterDelete()
    {

        Yii::$app->session->setFlash('danger', 'Автор удален');

    } // end function



    /**
     * @inheritdoc
     * @return ArticlesAuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesAuthorsQuery(get_called_class());
    }
}
