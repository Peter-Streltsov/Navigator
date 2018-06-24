<?php

/* @var $classes  */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?php

    $classes_items = ArrayHelper::map($classes, 'id', 'description');

    ?>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'direct_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'year')->textInput(['rows' => 3]) ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'type')->dropDownList($classes_items, [
                'prompt' => 'Выберите категорию',
                'style' => 'width: 30pc;'
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'file')->fileInput(['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <div class="form-group">

        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        <br>
    </div>

    <?php ActiveForm::end(); ?>


</div>