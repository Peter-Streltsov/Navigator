<?php

namespace app\models\publications\articles\collections;

// project classes
use app\models\identity\Authors as AuthorsCommon;
// yii classes
use Yii;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "articles_collections_authors";
 * Table contains linked data for ArticleCollection;
 * (many-to-many; junction table; links Authors models to current article);
 *
 * @property int $id
 * @property int $article_id
 * @property int $author_id
 *
 * @property ArticleCollection $article
 */
class Authors extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_collections_authors';
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
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleJournal::className(), 'targetAttribute' => ['article_id' => 'id']],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'part' => 'part',
            'article_id' => 'Article ID',
            'author_id' => 'Author ID',
        ];
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesbyauthor()
    {
        return $this->hasMany(ArticleCollection::className(), ['id' => 'article_id']);
    } // end function


    /**
     * gets author associated with current record
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
        return $this->hasMany(ArticleCollection::className(), ['id', 'author_id']);
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


    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        Yii::$app->session->setFlash('danger', 'Автор удален');
    } // end function


    /**
     * @inheritdoc
     * @return AuthorsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new AuthorsQuery(get_called_class());
    } // end function

} // end class
