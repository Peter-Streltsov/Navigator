<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Editions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="editions-form">

    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chiefeditor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'editor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
