<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Данные организации - редактировать';

?>

<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4> <?= Html::encode($this->title) ?></h4>
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'organisation')->textInput(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'weblink')->textInput(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <?= $form->field($model, 'first_page_message')->textarea(['rows' => 6]); ?>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-8">
                <?= Html::submitButton('Сохранить', ['class' => 'button primary big']); ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
