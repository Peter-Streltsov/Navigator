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
            $modaltextbutton = '<h5><span class="glyphicon glyphicon-book"></span>  Текст статьи не задан</h5>';
            $modaltextheader = 'Загрузить текст';
            ob_start();
            /*\mihaildev\ckeditor\CKEditor::widget([
            'editorOptions' => [
            'preset' => 'basic'
            ]
            ]);*/
            $form = ActiveForm::begin();
            echo $form->field($model, 'text')->textarea();
            echo Html::submitButton();
            ActiveForm::end();
            $modaltextcontent = ob_get_contents();
            ob_get_clean();
        } else {
            $class = 'button primary';
            $modaltextbutton = '<h5 style="color: green;">Текст статьи</h5>';
            $modaltextheader = '';
            ob_start();
            echo $model->text;

            echo "<br><br>";

            echo Html::beginForm('', 'post');
            echo Html::input('hidden', 'delete_text', 1);
            echo Html::submitButton();
            echo Html::endForm();
            $modaltextcontent = ob_get_contents();
            ob_get_clean();
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
                $modal = "<h5><span class='glyphicon glyphicon-file'></span>  Файл не прикреплен</h5>";
                $class = "button danger";
            } else {
                $modal = "<h5><span class='glyphicon glyphicon-file'></span>  Файл прикреплен</h5>";
                $class = 'button primary';
            }
        } else {
            $modal = "<h5><span class='glyphicon glyphicon-file'></span>  Файл не прикреплен</h5>";
            $class = 'button danger';
        }
        Modal::begin([
            'header' => 'Файл статьи',
            'toggleButton' => [
                'label' => $modal,
                'class' => $class
            ]
        ]);

        $uploadform = ActiveForm::begin();
        echo Html::hiddenInput('upload_flag', true);

        if (isset($model->file)) {
            echo "<h4>Текущий файл:</h4>";
            echo Html::input('text', 'text', $model->file, ['class' => 'form-control']);
        } else {
            echo "<h5 style='color: red;'>Файл не загружен</h5style>";
        }

        echo"<br><br>";

        echo "<h4>Загрузить новый файл:</h4>";

        echo"<br>";

        echo $uploadform->field($file, 'uploadedfile')->fileInput(['class' => 'btn btn-default']);

        echo "<br><br>";

        echo Html::submitButton('Сохранить', ['class' => 'button primary big']);

        $uploadform::end();

        Modal::end();
        ?>
    </div>
</div>
</div>