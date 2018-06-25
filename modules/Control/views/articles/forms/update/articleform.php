<?php

/* @var $classes \app\modules\Control\models\Articles[]|\app\modules\Control\models\IndexesArticles[]|array */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */
/* @var $title string */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
?>

<div class="panel panel-default">
    <div class="panel panel-body">

    <?php
    //\yii\widgets\Pjax::begin();
    ?>

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

    <div class="row">

        <div class="col-lg-12">
            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'style' => 'background-color: #ffffe0;',
            ]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <?= $form->field($model, 'magazine')->textInput([
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

        <div class="col-lg-8">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true, 'style' => 'background-color: #ffffe0;']) ?>
        </div>
    </div>

    <!--<?= $form->field($model, 'file')->textInput() ?>-->

    <div class="row">

        <div class="col-lg-12">

            <?= $form->field($model, 'class')->dropDownList($classes_items, [
                'prompt' => 'Выберите категорию',
            ]) ?>
        </div>

    </div>

<div class="form-group">

    <div class="row">

        <div class="col-lg-5">

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

    <?php //\yii\widgets\Pjax::end(); ?>

    <br>


</div>

    </div>
</div>