<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Conferencies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conferencies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-lg-10">

            <?= $form->field($model, 'report_title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'conferencion_name')->textInput(['maxlength' => true]) ?>

        </div>
    </div>

    <div class="row">

        <div class="col-lg-5">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'report_date')->textInput() ?>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-5">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-5">
            <?= $form->field($model, 'report_type')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-10">
            <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
        </div>

        </div>


    </div>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>