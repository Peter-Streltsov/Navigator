<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $classes  */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */
/* @var $types array */
/* @var $magazines  */
/* @var $languages \app\models\common\Languages */

?>


<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?php

    $classes_items = ArrayHelper::map($classes, 'id', 'description');

    ?>

    <div class="well">
        <b style="color: red;">Авторов необходимо сопоставить статье после создания базовой записи</b>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'magazine')->widget(Select2::className(), [
                'data' => $magazines,
                'options' => [
                        'tags' => true
                ]
            ]); ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'direct_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'year')->widget(\kartik\select2\Select2::className(), [
                    'data' => Yii::$app->yearselector->select,
                'pluginOptions' => [],
                'options' => [
                        'tags' => true
                ]
            ]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'language')->widget(Select2::className(), [
                'data' => $languages
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'type')->widget(Select2::className(), [
                    'data' => $types
            ]); ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'class')->widget(Select2::className(), [
                    'data' => $classes_items,
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'annotaion')->textarea(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'index')->textarea(['rows' => 5]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'file')->fileInput(['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <div class="form-group">

        <br>
        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        <br>
    </div>

    <?php ActiveForm::end(); ?>

    <br>
    <br>
    <br>

</div>