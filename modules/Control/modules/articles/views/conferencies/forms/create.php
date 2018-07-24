<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\ArticleConferencies */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'conferency_collection')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-5">
        <?= $form->field($model, 'language')->textInput() ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'text_index')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<br>
<br>

<div class="row">
    <div class="col-lg-5">
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
