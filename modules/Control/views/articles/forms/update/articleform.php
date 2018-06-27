<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $classes \app\modules\Control\models\Articles[]|\app\modules\Control\models\IndexesArticles[]|array */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */
/* @var $title string */
/* @var $languages array */
/* @var $newlanguage \app\models\common\Languages */
/* @var $magazines array */

?>

<div class="panel panel-default">
    <div class="panel panel-body">

    <?php $form = ActiveForm::begin([
            'options' => [
                    'data-pjax' => false
            ]
    ]); ?>

    <br>

    <?php

    echo Html::input('hidden', 'update', true);
    $classes_items = ArrayHelper::map($classes, 'id', 'description');

    ?>

    <!-- -->
    <div class="row">

        <div class="col-lg-12">
            <?= $form->field($model, 'title')->textarea([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;',
            ]) ?>
        </div>
    </div>

    <!-- -->
    <div class="row">

        <div class="col-lg-7">
            <?= $form->field($model, 'magazine')->widget(Select2::className(), [
                'data' => $magazines,
                'options' => ['placeholder'],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true,
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'number')->textInput([
                    'style' => 'background-color: #ffffe0;'
            ]); ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'direct_number')->textInput([
                    'style' => 'background-color: #ffffe0;'
            ]); ?>
        </div>
    </div>

    <!-- -->
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'language')->widget(Select2::classname(), [
                'data' => $languages,
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-lg-8">

            <?= $form->field($model, 'class')->widget(Select2::className(), [
                'data' => $classes_items,
                'options' => ['placeholder'],
                'pluginOptions' => [
                        'allowClear' => true
                ]
            ]);
            ?>
        </div>
    </div>


    <!-- year publishing and DOI index input - in one row -->
    <div class="row">

        <div class="col-lg-4">
            <?= $form->field($model, 'year')->widget(Select2::className(), [
                'data' => Yii::$app->yearselector->select,
                'options' => [
                        //'placeholder' => $model->year
                ],
                'pluginOptions' => [
                        'allowClear' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true, 'style' => 'background-color: #ffffe0;']) ?>
        </div>
    </div>

    <!-- -->
    <div class="row">
        <div class="col-lg-12">
            <?=$form->field($model, 'annotaion')->textarea([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;',
                'rows' => 5]); ?>
        </div>
    </div>


<div class="form-group">

    <div class="row">

        <div class="col-lg-5">

            <br>
            <br>

            <?php

            echo Html::submitButton(
                    '<span class="glyphicon glyphicon-ok"></span>  Сохранить',
                    [
                        'style' => 'color: green;',
                        'class' => 'btn btn-default'
                    ])
            ?>
            <br>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

    <br>


</div>

    </div>
</div>