<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-2">
        <?= $form->field($model, 'year')->textInput() ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'city')->widget(Select2::className(), [
            'data' => $cities,
            'pluginOptions' => [
                    'tags' => true
            ]
        ]) ?>
    </div>
    <div class="col-lg-7">
        <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-7">
        <?= $form->field($model, 'state_registration')->textInput(); ?>
    </div>
    <div class="col-lg-5">
        <?= $form->field($model, 'pages_number')->textInput(); ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-6">
        <?= $form->field($model, 'speciality')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'type')->widget(Select2::className(), [
                'data' => $types
        ]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'annotation')->textarea(['rows' => 3]) ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'index')->textarea(['rows' => 7]); ?>
    </div>
</div>

<br>

<div class="row">
    <div class="col-lg-7">
        <?= $form->field($model, 'link')->textInput(); ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

<?php ActiveForm::end(); ?>
