<?php

namespace app\modules\Control\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "monographies".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property int $year
 * @property string $doi
 * @property resource $file
 */
class Monographies extends \yii\db\ActiveRecord
{

    /**
     * @return array
     */
    public function behaviors()
    {

        return [
            'class' => TimestampBehavior::className(),
            //'updatedAtAttribute' => false
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographies';
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
            [['title', 'subtitle', 'doi'], 'string', 'max' => 255],
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
            'year' => 'Год издания',
            'doi' => 'ЦИО',
            'file' => 'File',
            'authors' => 'Авторы'
        ];

    } // end function



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonographies()
    {

        return $this->hasOne(MonographiesAuthors::className(), ['monography_id' => 'id']);

    } // end function



    /**
     * @return $this
     */
    public function getAuthors()
    {

        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->via('monographies');

    } // end function



    /**
     * @return $this
     */
    public function getData()
    {

        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->viaTable('monographies_authors', ['monography_id' => 'id']);

    } // end function


    /**
     * @param $id
     * @return array
     */
    public function getMonographiesByAuthor($id)
    {

        $authormonographies = MonographiesAuthors::find()
            ->where(['author_id' => $id])
            ->joinWith('monographiesbyauthor')
            ->asArray()
            ->all();

        // by default - empty array
        $monographies = [];

        // formatting array
        foreach ($authormonographies as $monography) {
            $monographies[] = $monography['monographiesbyauthor'][0];
        }

        return $monographies;

    } // end function



    /**
     * @inheritdoc
     * @return MonographiesQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new MonographiesQuery(get_called_class());

    } // end function

} // end class
