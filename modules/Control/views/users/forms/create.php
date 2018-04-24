<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">


    <?php $form = ActiveForm::begin([
        'validateOnType' => true
    ]); ?>

    <div class="well">
        Пароль будет сгенерирован автоматически при создании пользователя
    </div>

    <br>

    <div class="row">

        <div class="col-lg-10">
            <?= $form->field($model, 'username')->input('email')->label('Введите логин (адрес электронной почты)') ?>
        </div>
    </div>

    <br>

    <div class="row">

        <div class="col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Введите имя пользователя') ?>
        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label('Введите фамилию пользователя') ?>
        </div>

    </div>

    <br>

    <div class="row">

        <div class="col-lg-5">
            <?php $tokens = \yii\helpers\ArrayHelper::map($tokens, 'token', 'token') ?>
            <?= $form->field($model, 'access_token')->dropDownList($tokens)->label('Токен (уровень доступа)') ?>
        </div>

    </div>

        <br>
        <br>
    <br>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>