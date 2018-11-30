<?php

namespace app\models\filesystem;

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
            [['uploadedfile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['jpg', 'jpeg', 'pdf'], 'maxFiles' => 1],
        ];

    } // end function



    public function attributeLabels()
    {

        return [
            'uploadedfile' => 'Загруженный файл'
        ];

    }


    /**
     * uploads file and sets uploaded file name to Upload model
     *
     * @param string $folder - directory to load file to (must be available to write)
     * @return bool
     */
    public function upload($folder = '')
    {

        if ($folder != '') {
            $folder = '/' . $folder. '/';
        }

        if ($this->validate()) {
            $this->uploadedfile->saveAs('files/' . $folder . $this->uploadedfile->baseName . '.' . $this->uploadedfile->extension);
            $this->name = (string)$this->uploadedfile->baseName . '.' . $this->uploadedfile->extension;
            \Yii::$app->session->setFlash('success', 'Файл загружен');
            return true;
        } else {

            \Yii::$app->session->setFlash('danger', 'Не удалось загрузить файл');

            return false;
        }

    } // end function

} // end class
