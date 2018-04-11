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
    }

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
            'file' => 'Просмотр',
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
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new ArticlesQuery(get_called_class());

    } // end function

} // end class
