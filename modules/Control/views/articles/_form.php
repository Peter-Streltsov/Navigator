<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'file')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
