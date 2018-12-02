<?php

namespace app\models\units\articles\conferences;

use app\models\identity\Authors as AuthorsCommon;
// yii classes
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles_conferencies_authors".
 *
 * @property int $id
 * @property int $article_id
 * @property int $author_id
 *
 * @property ArticleConferency $article
 */
class Authors extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'articles_conferences_authors';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['article_id', 'author_id'], 'required'],
            [['article_id', 'author_id'], 'integer'],
            [['part'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleConference::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'part' => 'Процент',
            'article_id' => 'Идентификатор статьи',
            'author_id' => 'Идентификатор автора',
        ];

    } // end function



    public function getArticlesbyauthor()
    {

        return $this->hasMany(Articles::className(), ['id' => 'article_id']);

    }



    /**
     * gets author linked with current model
     *
     * @return Authors|string|null
     */
    public function getAuthor()
    {
        $author = AuthorsCommon::find()->where(['id' => $this->author_id])->one();

        if ($author != null) {
            return $author->name . ' ' . $author->lastname;
        } else {
            return 'Not set';
        }
    } // end function


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

        if (Authors::find()->where([
            'author_id' => $this->author_id,
            'article_id' => $this->article_id
        ])->exists()) {
            Yii::$app->session->setFlash('warning', 'Автор с таким id уже сопоставлен статье');
            return false;
        } else {
            Yii::$app->session->setFlash('info', 'Автор сопоставлен статье');
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
     * @return AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new AuthorsQuery(get_called_class());

    } // end function

} // end class
