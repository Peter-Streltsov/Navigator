<?php

use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4 style="color: gray;">Добавить статью - публикации в сборниках и главы книг</h4>
    </div>
    <div class="panel panel-body">
        <?php $form = ActiveForm::begin() ?>

        <br>

        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-alert"> Авторов, цитирования и организации необходимо сопоставить статье после создания базовой записи</span>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'title')->textarea(['rows' => 5, 'maxlength' => true]) ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'collection')->textarea(['rows' => 3]) ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-7">
                <?= $form->field($model, 'section')->textInput(['rows' => 6]) ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'section_number')->textInput() ?>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= $form->field($model, 'language')->widget(Select2::className(), [
                    'model' => $languages,
                    'pluginOptions' => [
                        'tags' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'year')->widget(Select2::className(), [
                    'data' => Yii::$app->yearselector->select,
                    'options' => [
                        'placeholder' => $model->year
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'type')->dropDownList($model->availableTypes) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <?= $form->field($model, 'class')->dropDownList($indexes) ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <br>
        <br>
        <br>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<!--<div class="articles-form">

</div>-->