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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <br>

    <?= $form->field($model, 'subtitle')->textarea(['maxlength' => true]) ?>

    <br>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <br>

    <div class="form-inline">
    <?= $form->field($model, 'year')->textInput(['rows' => 3]) ?>

    <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>
    </div>

    <br>
    <br>

    <?= $form->field($model, 'file')->fileInput(['class' => 'btn btn-default']) ?>

    <br>

    <?= $form->field($model, 'class')->dropDownList($classes_items, [
        'prompt' => 'Выберите категорию',
        'style' => 'width: 30pc;'
    ]) ?>

    <br>
    <br>

    <div class="form-group">

        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        <br>
    </div>

    <?php ActiveForm::end(); ?>


</div>