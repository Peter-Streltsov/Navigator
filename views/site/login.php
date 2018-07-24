<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-offset-3 col-lg-7">

            <br>
            <br>

            <h1><?= Html::encode($this->title) ?></h1>

            <br>
            <br>
            <br>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-10\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'label' => 'Оставаться в системе',
                'template' => "<div class=\"col-lg-offset-1 col-lg-10\">{input} {label}</div><div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <br>
            <br>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        </div>
    </div>

<br>
<br>
<br>
<br>
<br>
