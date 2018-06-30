<?php

namespace app\models\units\dissertations;

use Yii;

/**
 * This is the model class for table "dissertations".
 *
 * @property int $id
 * @property int $type
 * @property string $title
 * @property int $year
 * @property string $city
 * @property int $habilitation
 * @property string $organisation
 * @property string $speciality
 * @property int $pages_number
 * @property string $language
 * @property string $state_registration
 * @property int $author
 * @property string $annotation
 * @property string $link
 * @property string $index
 * @property string $file
 */
class Dissertations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dissertations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'year', 'city', 'habilitation', 'speciality', 'author'], 'required'],
            [['type', 'year', 'habilitation', 'pages_number', 'author'], 'integer'],
            [['annotation', 'index'], 'string'],
            [['title', 'city', 'organisation', 'speciality', 'language', 'state_registration', 'link', 'file'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'year' => 'Year',
            'city' => 'City',
            'habilitation' => 'Habilitation',
            'organisation' => 'Organisation',
            'speciality' => 'Speciality',
            'pages_number' => 'Pages Number',
            'language' => 'Language',
            'state_registration' => 'State Registration',
            'author' => 'Author',
            'annotation' => 'Annotation',
            'link' => 'Link',
            'index' => 'Index',
            'file' => 'File',
        ];
    }

    /**
     * @inheritdoc
     * @return DissertationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DissertationTypesQuery(get_called_class());
    }
}
