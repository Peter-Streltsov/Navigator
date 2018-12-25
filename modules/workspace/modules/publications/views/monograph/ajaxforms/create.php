<?php

use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Добавить публикацию - книги и монографии</h4>
    </div>
    <div class="panel panel-body">
        <?php $form = ActiveForm::begin() ?>

        <br>

        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-alert"> Авторов, цитирования и организации необходимо сопоставить публикации после создания базовой записи</span>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'title')->textarea(['rows' => 3, 'maxlength' => true]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-2">
                <?= $form->field($model, 'year')->widget(Select2::className(), [
                    'data' => Yii::$app->yearselector->select,
                    'options' => [
                        'placeholder' => $model->year
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-7">
                <?= $form->field($model, 'publisher')->textInput(); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'pages_number')->textInput(); ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= $form->field($model, 'city')->textInput(); ?>
            </div>
            <div class="col-lg-7">
                <?= $form->field($model, 'class')->textInput(); ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'volume_name')->textInput(); ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'volume_number')->textInput(); ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-7">
                <?= $form->field($model, 'series_name')->textInput(); ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'series_number')->textInput(); ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-3">
                <?= $form->field($model, 'isbn')->textInput(); ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>