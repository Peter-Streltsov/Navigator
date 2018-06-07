<?php

namespace app\modules\Control\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\modules\Control\models\Articles;

/**
 * This is the model class for table "upload".
 *
 * @property int $id
 * @property int $author_id
 * @property string $description
 * @property resource $uploadedfile
 * @property int $accepted
 */
class Upload extends \yii\db\ActiveRecord
{

    //public $uploadedfile;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {

        return 'upload';

    } // end function



    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'publisher', 'class', 'year'], 'required'],
            [['author_id'], 'integer'],
            [['description', 'class', 'subtitle', 'publisher'], 'string'],
            [['uploadedfile'], 'string'],
            [['accepted'], 'string', 'max' => 1],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'author_id' => 'ID автора',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'publisher' => 'Издатель',
            'year' => 'Год издания',
            'class' => 'Категория',
            'description' => 'Описание',
            'uploadedfile' => 'Загруженный файл',
            'accepted' => 'Accepted',
        ];

    } // end function



    public function upload()
    {

        if ($this->validate()) {
            $this->file->saveAs('upload/' . $this->file->baseName . '.' . $this->file->extension);
            $this->uploadedfile = $this->file->basename;
            return true;
        } else {

            \Yii::$app->session->setFlash('danger', 'Не удалось загрузить файл');

            return false;
        }

    } // end function



    /**
     * creates Article model from existing Upload model
     *
     * @return bool
     */
    public static function createArticle($id)
    {

        $upload = Upload::find()->where(['id' => $id])->one();

        // creating new Articles model and getting parameters from Upload model
        $article = new Articles();
        $article->title = $upload->title;
        $article->publisher = $upload->publisher;
        $article->year = $upload->year;

        if (isset($upload->subtitle)) {
            $article->subtitle = $upload->subtitle;
        }

        if ($article->save()) {
            return true;
        } else {
            return false;
        }

    } // end function



    /**
     * creates Monographies model from existing Upload model
     *
     * @return bool
     */
    public static function createMonograph($id)
    {


    } // end function



    /**
     * @inheritdoc
     * @return UploadQuery the active query used by this AR class.
     */
    public static function find()
    {

        return new UploadQuery(get_called_class());

    } // end function

} // end class
