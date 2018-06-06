<?php

namespace app\modules\Control\models;

use yii\base\Model;

class Fileupload extends Model
{

    public $uploadedfile;
    public $name;

    /**
     * @return array
     */
    public function rules()
    {

        return [
            [['uploadedfile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf', 'maxFiles' => 1],
        ];

    } // end function



    /**
     * uploads file and sets uploaded file name to Upload model

     * @return bool
     */
    public function upload($folder = '')
    {

        if ($folder != '') {
            $folder = '/' . $folder. '/';
        }

        if ($this->validate()) {
            $this->uploadedfile->saveAs('upload/' . $folder . $this->uploadedfile->baseName . '.' . $this->uploadedfile->extension);
            $this->name = (string)$this->uploadedfile->baseName . '.' . $this->uploadedfile->extension;
            \Yii::$app->session->setFlash('success', 'Файл загружен');
            return true;
        } else {

            \Yii::$app->session->setFlash('danger', 'Не удалось загрузить файл');

            return false;
        }

    } // end function

} // end class
