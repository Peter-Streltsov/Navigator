<?php

namespace app\models\identity;

// project classes
use app\models\publications\dissertations\Dissertations;
use app\models\publications\monograph\Monograph;
use app\models\publications\articles\journals\ArticleJournal;
use app\models\publications\articles\conferences\ArticleConference;
use app\models\publications\articles\collections\ArticleCollection;
// yii classes
use Yii;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "authors";
 *
 * @property int $id
 * @property string $name
 * @property string $secondname
 * @property string $lastname
 */
class Authors extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname'], 'required'],
            [['user_id', 'habilitation', 'personnel_id'], 'integer'],
            [['name', 'secondname', 'lastname'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'secondname' => 'Отчество',
            'lastname' => 'Фамилия',
            'habilitation' => 'Ученая степень',
            'user_id' => 'Идентификатор пользователя'
        ];
    } // end function


    /******************************************************************************************************************/
    /** JUNCTION RECORDS **********************************************************************************************/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesJournalsAuthors()
    {
        return $this->hasMany(
            \app\models\publications\articles\journals\Authors::className(),
            ['author_id' => 'id']
        );
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesConferencesAuthors()
    {
        return $this->hasMany(
            \app\models\publications\articles\conferences\Authors::className(),
            ['author_id' => 'id']
        );
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesCollectionsAuthors()
    {
        return $this->hasMany(
            \app\models\publications\articles\collections\Authors::className(),
            ['author_id' => 'id']
        );
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonographsAuthors()
    {
        return $this->hasMany(
            \app\models\publications\monograph\Authors::className(),
            ['author_id' => 'id']
        );
    } // end function


    /** END JUNCTION **************************************************************************************************/
    /******************************************************************************************************************/



    /******************************************************************************************************************/
    /** GETTERS *******************************************************************************************************/

    /**
     * gets and returns initials of current author
     *
     * @return string
     */
    public function getInitials()
    {
        $initials = '';
        $initials .= $this->name[0] . '.';
        if ($this->secondname != null && $this->secondname != '') {
            $initials .= $this->secondname[0] . '.';
        }
        return $initials;
    } // end function


    /**
     * lists staff member dissertations
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDissertations()
    {
        return $this->hasMany(Dissertations::className(), ['author' => 'id']);
    } // end function


    /**
     * lists Dissertations published in last five years for current author
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndexedDissertations()
    {
        $years = range(date('Y') - 4, date('Y'));
        return $this->hasMany(Dissertations::className(), ['id' => 'article_id'])
            ->where(['year' => $years])
            ->via('articlesJournalsAuthors');
    } // end function


    /**
     * lists ArticlesJournals having current author linked to
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesJournals()
    {
        return $this->hasMany(ArticleJournal::className(), ['id' => 'article_id'])
            ->via('articlesJournalsAuthors');
    } // end function


    /**
     * lists ArticlesJournals published in current year and having current author linked to
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrentArticlesJournals()
    {
        return $this->hasMany(ArticleJournal::className(), ['id' => 'article_id'])
            ->where(['year' => date('Y')])
            ->via('articlesJournalsAuthors');
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndexedArticlesJournals()
    {
        $years = range(date('Y') - 4, date('Y'));
        return $this->hasMany(ArticleJournal::className(), ['id' => 'article_id'])
            ->where(['year' => $years])
            ->viaTable('articles_journals_authors', ['author_id' => 'id']);
    } // end function


    /**
     * lists ArticleConference having current author linked
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesConferences()
    {
        return $this->hasMany(ArticleConference::className(), ['id' => 'article_id'])
            ->via('articlesConferencesAuthors');
    } // end function*/


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndexedArticlesConferences()
    {
        $years = range(date('Y') - 4, date('Y'));
        return $this->hasMany(ArticleConference::className(), ['id' => 'article_id'])
            ->where(['year' => $years])
            ->viaTable('articles_conferences_authors', ['author_id' => 'id']);
    } // end function


    /**
     * lists ArticlesCollection having current author linked
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesCollections()
    {
        return $this->hasMany(ArticleCollection::className(), ['id' => 'article_id'])
            ->via('articlesCollectionsAuthors');
    } // end function


    /**
     * lists ArticleCollection for last five years for current author
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndexedArticlesCollections()
    {
        $years = range(date('Y') - 4, date('Y'));
        return $this->hasMany(ArticleCollection::className(), ['id' => 'article_id'])
            ->where(['year' => $years])
            ->viaTable('articles_collections_authors', ['author_id' => 'id']);
    } // end function


    /**
     * lists Monograph having current author linked
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMonographs()
    {
        return $this->hasMany(Monograph::className(), ['id' => ''])
            ->via('monographsAuthors');
    } // end function


    /**
     * lists Monograph published in last five years for current author
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndexedMonograph()
    {
        $years = range(date('Y') - 4, date('Y'));
        return $this->hasMany(Monograph::className(), ['id' => 'article_id'])
            ->where(['year' => $years])
            ->via('articlesJournalsAuthors');
    } // end function


    /** END GETTERS ***************************************************************************************************/
    /******************************************************************************************************************/


    /**
     * checks existence of linked Users model;
     *
     * @return bool
     */
    public function hasUser()
    {
        $user = Users::find()->where(['id' => $this->user_id])->count();
        return $user > 0 ? true : false;
    } // end function


    /**
     * checks existence of linked Personnel model;
     *
     * @return bool
     */
    public function hasPersonnel()
    {
        $personnel = Personnel::find()->where(['user_id' => $this->user_id])->count();
        return $personnel > 0 ? true : false;
    } // end function


    /******************************************************************************************************************/
    /******************************************************************************************************************/


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Автор добавлен');
        } else {
            Yii::$app->session->setFlash('danger', 'Данные автора обновлены');
        }
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
