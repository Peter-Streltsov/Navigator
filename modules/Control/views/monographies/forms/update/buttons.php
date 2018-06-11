<?php

use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


/* @var $file \app\modules\Control\models\Fileupload|mixed|string */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */
?>
<div class="row">
    <div class="col-lg-5">

        <?php

        if (!isset($model->text)) {
            $class = 'button danger';
            $modaltextbutton = '<br><h5>Текст статьи не задан</h5><br>';
            $modaltextheader = 'Загрузить текст';
            ob_start();
            /*\mihaildev\ckeditor\CKEditor::widget([
            'editorOptions' => [
            'preset' => 'basic'
            ]
            ]);*/
            $modaltextcontent = ob_get_contents();
            ob_get_clean();
        } else {
            $class = 'button primary';
            $modaltextbutton = '<h5 style="color: green;">Текст статьи</h5>';
            $modaltextheader = '';
            ob_start();
            $modaltextcontent = ob_get_contents();
        }

        Modal::begin([
            'header' => $modaltextheader,
            'toggleButton' => [
                'label' => $modaltextbutton,
                'class' => $class
            ]
        ]);

        echo $modaltextcontent;

        Modal::end();

        ?>

    </div>

    <div class="col-lg-0">

    </div>

    <div class="col-lg-5">
        <?php

        if (isset($model->file)) {
            if ($model->file == '') {
                $modal = "<br><h5 style='color: red;'>Имя файла не задано!</h5><br><br>";
            } else {
                $modal = "<br><h5 style='color: green;'>Прикрепленный файл  - <br>" . $model->file . " </h5>";
            }
        } else {
            $modal = "<h5 style='color: red;'>Файл не загружен</h5>";
        }
        \yii\bootstrap\Modal::begin([
            'header' => 'Файл статьи',
            'toggleButton' => [
                'label' => $modal,
                'style' => 'max-width: 50vh;',
                'class' => 'button'
            ]
        ]);

        $uploadform = ActiveForm::begin();
        echo Html::hiddenInput('upload_flag', true);
        echo $uploadform->field($file, 'uploadedfile')->fileInput();
        echo Html::submitButton('Сохранить', ['class' => 'button']);
        $uploadform::end();

        \yii\bootstrap\Modal::end();
        ?>
    </div>
</div>
</div>