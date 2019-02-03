<?php

// yii classes
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
// extension classes
use lo\icofont\FI;
use kartik\select2\Select2;

/* @var $this \yii\web\View */
/* @var $model \app\models\publications\monograph\Monograph|mixed|\yii\db\ActiveRecord */
/* @var $classes \app\models\pnrd\indexes\IndexesArticles[]|array */
?>

<div class="panel panel-default">
    <div class="panel panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?php

    $classes_items = ArrayHelper::map($classes, 'id', 'description');

    ?>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'title')->textarea([
                'maxlength' => true,
                'rows' => 3,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'publisher')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
    </div>


    <!-- year publishing and DOI index input - in one row -->
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
                'yearStart' => -10,
                'yearEnd' => 10,
            ]);
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'isbn')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'city')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <?= $form->field($model, 'class')->widget(\kartik\select2\Select2::className(), [
                    'model' => $classes_items
            ]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'language')->widget(Select2::classname(), [
                'data' => $languages,
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <?= $form->field($model, 'volume_name')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'series_name')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <br>
            <br>
            <br>
            <?= Html::submitButton(
                    FI::icon('check-circled')->size(FI::SIZE_LARGE) . '  Сохранить',
                    ['class' => 'btn btn-default']
            ) ?>
            <br>
            <br>
        </div>
    </div>
        <?php ActiveForm::end(); ?>
        <br>
    </div>
</div>