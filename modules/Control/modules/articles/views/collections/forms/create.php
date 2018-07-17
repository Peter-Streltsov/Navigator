<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="articles-form">

    <?php $form = ActiveForm::begin() ?>

    <br>

    <div class="well">
        <b style="color: red;">Авторов необходимо сопоставить статье после создания базовой записи</b>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'collection')->textInput(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'type')->textInput() ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'section')->textInput(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'language')->widget(Select2::className(), [
                    'model' => $languages
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'section_number')->textInput() ?>
        </div>
    </div>


    <br>
    <br>
    <br>

    <?php ActiveForm::end(); ?>

</div>
