<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Добавить диссертацию</h4>
    </div>
    <div class="panel panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">

            <div class="col-lg-12">
                <?= $form->field($model, 'title')->textarea(['placeholder' => 'Введите название диссертации', 'maxlength' => true]) ?>
            </div>
        </div>

        <br>

        <div class="row">

            <div class="col-lg-6">
                <?= $form->field($model, 'author')->widget(Select2::className(), [
                    'data' => $authors,
                    'options' => [
                        'placeholder' => 'Выберите автора'
                    ]
                ]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'type')->widget(Select2::className(), [
                    'data' => $types,
                    'options' => [
                        'placeholder' => 'Выберите тип публикации'
                    ]
                ]); ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= $form->field($model, 'city')->widget(Select2::className(), [
                    'data' => $cities,
                    'options' => [
                        'placeholder' => 'Город'
                    ],
                    'pluginOptions' => [
                        'tags' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'year')->widget(Select2::className(), [
                    'data' => Yii::$app->yearselector->select,
                    'options' => [
                        'placeholder' => 'Выберите год защиты'
                    ]
                ]) ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'habilitation')->widget(Select2::className(), [
                    'data' => $habilitations,
                    'options' => [
                        'placeholder' => 'Выберите ученую степень'
                    ]
                ]) ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-3">
                <?= $form->field($model, 'pages_number')->textInput(['placeholder' => 'Введите количество страниц']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'organisation')->textInput(['placeholder' => 'Название организации, в которой проходила защита', 'maxlength' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'speciality')->textInput(['placeholder' => 'Введите название специальности', 'maxlength' => true]) ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-7">
                <?= $form->field($model, 'link')->textInput(['placeholder' => 'Ссылка на сетевой ресурс']) ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'state_registration')->textInput(['placeholder' => 'Номер государственной регистрации']) ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'annotation')->textarea(['placeholder' => 'Аннотация диссертации', 'rows' => 6]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<br>
<br>
<br>
