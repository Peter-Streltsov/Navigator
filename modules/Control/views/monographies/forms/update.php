<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
/* @var $author_items  */
/* @var $file mixed|string */
/* @var $model_authors  */
/* @var $authors  */
?>

<!-- main data form -->
<div class="monographies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'year')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'file')->textInput() ?>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- end form -->


<!-- authors form -->
<div class="articles-form">

    <div class="row">

        <div class="col-lg-6">

            <br>
            <br>
            <h4>Авторы:</h4>
            <br>
            <div class="form-inline">

                <?php

                foreach ($model_authors['data'] as $author) {
                    echo Html::beginForm(['monographies/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
                    echo Html::input('text', 'username', $author->name.' '.$author->lastname, ['class' => 'form-control']);
                    echo Html::input('hidden', 'delete', '1');
                    echo Html::input('hidden', 'author', $author->id);
                    echo Html::submitButton('Удалить', ['class' => 'button primary big']);
                    echo Html::endForm();
                    echo "<br>";
                }
                ?>

            </div>

            <div style="width:30pc;" class="form-group">


                <br>
                <br>
                <h4>Добавить автора</h4>
                <br>

                <?php $form = ActiveForm::begin(); ?>
                <?php echo $form->field($model, 'authors')->dropDownList($author_items, ['style' => 'width: 25pc;']); ?>
                <?= Html::submitButton('Добавить', ['class' => 'button primary big']); ?>
                <?php ActiveForm::end(); ?>

            </div>

        </div>

        <div class="col-lg-4">

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
                'toggleButton' => ['label' => $modal]
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
