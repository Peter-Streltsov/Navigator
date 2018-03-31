<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <!--<?= \yii\helpers\VarDumper::dump($classes); ?>-->

    <?php $classes_items = \yii\helpers\ArrayHelper::map($classes, 'id', 'description'); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput() ?>

    <!--<?= $form->field($model, 'class')->dropDownList($classes_items) ?>-->

    <?= $form->field($model, 'class')->listBox($classes_items); ?>

    <div class="form-group">

        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <?php ActiveForm::end(); ?>


</div>
