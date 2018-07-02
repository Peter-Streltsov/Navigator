<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row">

    <div class="col-lg-10">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'author')->dropDownList(\yii\helpers\ArrayHelper::map($authors, 'name', 'name')) ?>
    </div>

</div>


<div class="row">

    <div class="col-lg-5">
    </div>

</div>


<div class="row">

    <div class="col-lg-10">
        <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'speciality')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>
    </div>

</div>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
</div>

<?php ActiveForm::end(); ?>