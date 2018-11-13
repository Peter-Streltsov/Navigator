<?php

namespace app\models\identity;

use Yii;

/**
 * ActiveRecord class for table "authors";
 *
 * @property int $id
 * @property string $name
 * @property string $secondname
 * @property string $lastname
 */
class Authors extends \yii\db\ActiveRecord
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
            'habilitation' => 'Ученая степень'
        ];
    } // end function


    /**
     * GETTERS
     */

    public function getArticlesJournalsAuthors()
    {
        return $this->hasMany(\app\models\units\articles\journals\Authors::className(), []);
    }


    /**
     * lists staff member dissertations
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDissertations()
    {
        return $this->hasMany(Dissertations::className(), []);
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesJournals()
    {
        return $this->hasMany(ArticleJournal::className(), [])->viaTable();
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesConferences()
    {
        return $this->hasMany(ArticleConference::className(), [])->viaTable();
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesCollections()
    {
        return $this->hasMany(ArticleCollection::className(), [])->viaTable();
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonographs()
    {
        return $this->hasMany(Monograph::className(), [])->viaTable();
    } // end function

    /**
     * ENDGETTERS
     */


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
