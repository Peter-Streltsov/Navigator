<?php

namespace app\modules\Control\models;

use Yii;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $publisher
 * @property int $year
 * @property string $doi
 * @property resource $file
 *
 * @property ArticlesAuthors[] $articlesAuthors
 */
class Articles extends \yii\db\ActiveRecord
{

    public static $authorid = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'year'], 'required'],
            [['year'], 'integer'],
            [['file'], 'string'],
            [['title', 'subtitle', 'publisher', 'doi'], 'string', 'max' => 255],
            [['class'], 'exist', 'skipOnError' => true, 'targetClass' => IndexesArticles::className(), 'targetAttribute' => ['class' => 'id']],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'publisher' => 'Издатель',
            'year' => 'Год издания',
            'doi' => 'ЦИО',
            'file' => 'Файл',
            'authors' => 'Авторы',
            'class' => 'Категория',
        ];
    } // end function



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass0()
    {

        return $this->hasOne(IndexesArticles::className(), ['id' => 'class']);

    } // end function



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {

        return $this->hasOne(\app\modules\Control\models\ArticlesAuthors::className(), ['article_id' => 'id']);

    } // end function



    /**
     * @return $this
     */
    public function getAuthors()
    {

        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->via('articles');

    } // end function



    /**
     * @return $this
     */
    public function getData()
    {

        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->viaTable('articles_authors', ['article_id' => 'id']);

    } // end function



    /**
     * @return $this
     */
    public function getAuthorsarticles()
    {

        return $this->hasMany(Articles::className(), ['id' => 'article_id'])->viaTable('articles_authors', ['author_id' => static::$authorid]);

    } // end function



    /**
     *
     * getting indexes for current author
     *
     * @param $id integer
     * @return array
     */
    public static function getArticlesForAuthor($id)
    {

        $authorarticles = ArticlesAuthors::find()
            ->where(['author_id' => $id])
            ->joinWith('articlesbyauthor')
            ->asArray()
            ->all();

        // by default - empty array
        $articles = [];

        // formatting array
        foreach ($authorarticles as $article) {
            $articles[] = $article['articlesbyauthor'][0];
        }

        return $articles;

    } // end function



    /**
     * @param $id
     * @return array
     */
    public static function getCurrentArticles($id)
    {

        $year = date('Y');

        $articles = static::getArticlesForAuthor($id);

        $sortedarticles = [];

        foreach ($articles as $article) {
            if ($article['year'] == $year) {
                $sortedarticles[] = $article;
            }
        }

        return $sortedarticles;

    } // end function



    /**
     * @param int $year
     * @return array
     */
    public static function getArticlesByYear(int $year)
    {

        $articles = Articles::find()->asArray()->all();
        $sortedarticles = [];

        foreach ($articles as $article) {
            if ($article['year'] == $year) {
                $sortedarticles[] = $article;
            }
        }

        return $sortedarticles;

    } // end function


    /**
     * gets article affilation
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAffilation()
    {

        return $this->hasOne(ArticlesAffilations::className(), ['article_id' => 'id']);

    } // end function



    /**
     * collecting indexes for current year articles
     *
     * @param $id integer
     * @return float
     */
    public static function getIndexes($id)
    {

        $indexes = [];

        $articles = static::getCurrentArticles($id);

        foreach ($articles as $article) {
            $query = IndexesArticles::find()
                ->select('value')
                ->where(['id' => (int)$article['class']])
                ->asArray()
                ->one();

            $indexes[] = (float)$query['value'];
        }

        return array_sum($indexes);

    } // end function



    /**
     * @param $year
     * @return float|int
     */
    public static function getIndexesByYear($year)
    {

        $indexes = [];

        //$articles = static::getCurrentArticles($id);

        $articles = static::getArticlesByYear($year);

        foreach ($articles as $article) {
            $query = IndexesArticles::find()
                ->select('value')
                ->where(['id' => (int)$article['class']])
                ->asArray()
                ->one();

            $indexes[] = (float)$query['value'];
        }

        return array_sum($indexes);

    } // end function


    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {

        //return parent::beforeSave($insert);
        if (Articles::find()->where([
            'title' => $this->title,
            'year' => $this->year,
            'publisher' => $this->publisher
        ])->exists()) {
            Yii::$app->session->setFlash('danger', 'Статья с заданными параметрами уже есть в базе данных');
            return false;
        }

        return true;

    } // end function



    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Статья добавлена');
        } else {
            Yii::$app->session->setFlash('success', 'Данные статьи обновлены');
        }

    } // end function




    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticlesQuery(get_called_class());

    } // end function

} // end class
