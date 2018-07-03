<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">

    <div class="col-lg-12">
        <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
    </div>
</div>


<div class="row">

    <div class="col-lg-6">
        <?= $form->field($model, 'author')->widget(Select2::className(), [
            'data' => $authors
        ]) ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'type')->widget(Select2::className(), [
            'data' => $types
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <?= $form->field($model, 'city')->widget(Select2::className(), [
            'data' => $cities,
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true
            ]
        ]) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'year')->widget(Select2::className(), [
                'data' => Yii::$app->yearselector->select
        ]) ?>
    </div>
    <div class="col-lg-5">
        <?= $form->field($model, 'habilitation')->widget(Select2::className(), [
            'data' => $habilitations
        ]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <?= $form->field($model, 'pages_number') ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model, 'speciality')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <?= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>
    </div>

</div>

<br>
<br>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
</div>

<?php ActiveForm::end(); ?>

<br>
<br>
<br>
