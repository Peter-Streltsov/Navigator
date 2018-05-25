<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
/* @var $author_items  */
/* @var $file mixed|string */
/* @var $classes  */
/* @var $model_authors  */
/* @var $authors  */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?php

    $classes_items = \yii\helpers\ArrayHelper::map($classes, 'id', 'description');

    ?>

    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <!-- Subtite input - text area (max 255 chars) -->
    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <?= $form->field($model, 'subtitle')->textArea(['rows' => 2, 'maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <!-- year publishing and DOI index input - in one row -->
    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-3">
            <?= $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
                'yearStart' => -10,
                'yearEnd' => 10,
                ]);
            ?>
        </div>

        <div class="col-lg-7">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <!--<?= $form->field($model, 'file')->textInput() ?>-->

    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-7">

    <?= $form->field($model, 'class')->dropDownList($classes_items, [
        'prompt' => 'Выберите категорию',
        //'style' => 'width: 10px;',
    ]) ?>
        </div>

    </div>
</div>


    <div class="form-group">

        <div class="row">

            <div class="col-lg-1"></div>

            <div class="col-lg-5">

            <br>
            <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
            <br>
            </div>

    </div>

    <?php ActiveForm::end(); ?>

    <br>


</div>

<br>
<br>

<div class="articles-form">

    <div class="row">

        <div class="col-lg-1"></div>

        <div class="col-lg-6">

            <h4>Авторы:</h4>
            <br>

            <div class="form-inline">

                <?php

                foreach ($model_authors['data'] as $author) {
                    echo Html::beginForm(['articles/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
                    echo Html::input('text', 'username', $author->name.' '.$author->lastname, ['class' => 'form-control', 'readonly' => true]);
                    echo Html::input('hidden', 'delete', '1');
                    echo Html::input('hidden', 'author', $author->id);
                    echo Html::submitButton('Удалить', ['class' => 'button primary big']);
                    echo Html::endForm();
                    echo "<br>";
                }
                ?>

            </div>

            <div class="form-group">

                <br>
                <h4>Добавить автора</h4>
                <br>

                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'authors')->dropDownList($author_items, ['style' => 'width: 22pc;']); ?>
                <?= Html::submitButton('Добавить', ['class' => 'button primary big']); ?>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <div class="col-lg-4">

            <br>
            <br>
            <br>

            <div>
                <?php
                if (!isset($model->text)) {
                    $class = 'button danger';
                    $modaltextbutton = '<h5>Текст статьи не задан</h5>';
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

            <br>
            <br>

            <div>
                <?php
                if (isset($model->file)) {
                    if ($model->file == '') {
                        $modal = "<h5 style='color: red;'>Имя файла не задано!</h5>";
                    } else {
                        $modal = "<h5 style='color: green;'>Прикрепленный файл </h5>" . $model->file;
                    }
                } else {
                    $modal = "<h5 style='color: red;'>Файл не загружен</h5>";
                }
                \yii\bootstrap\Modal::begin([
                    'header' => 'Файл статьи',
                    'toggleButton' => [
                        'label' => $modal,
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

    <br>
    <br>

    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-7">
            <h4>Цитирования</h4>
        </div>
    </div>
</div>
