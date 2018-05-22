<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Upload */
/* @var $form yii\widgets\ActiveForm */
/* @var $file mixed|string */
/* @var $author  */
/* @var $classes  */
/* @var $user null|\yii\web\IdentityInterface */
?>


<div style="margin-left: 3pc; width: 50pc;" class="form-group-sm">

    <br>
    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::hiddenInput('upload_flag', '1') ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'author_id')->textInput(['value' => $author->id, 'readonly' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
                'yearStart' => -25,
                'yearEnd' => 10,
            ]); ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'class')->dropDownList($classes); ?>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'subtitle')->textArea(['rows' => 2]) ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'publisher')->textInput() ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($file, 'uploadedfile')->fileInput([
                'class' => 'btn btn-default',
                'multiple' => true
            ]) ?>
        </div>
    </div>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>