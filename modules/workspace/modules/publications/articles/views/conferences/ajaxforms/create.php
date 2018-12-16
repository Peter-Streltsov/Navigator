<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\publications\articles\conferences\ArticleConference */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Добавить статью - публикации материалов конференций</h4>
    </div>
    <div class="panel panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <br>

        <?php

        $classes_items = ArrayHelper::map($classes, 'id', 'description');

        ?>

        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-alert"> Авторов, цитирования и организации необходимо сопоставить статье после создания базовой записи</span>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'title')->textarea(['maxlength' => true]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'conference_collection')->textarea(['maxlength' => true]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'section')->textInput() ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-3">
                <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'year')->widget(\kartik\select2\Select2::className(), [
                    'data' => Yii::$app->yearselector->select,
                    'pluginOptions' => [
                        'tags' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-5">
                <?= $form->field($model, 'language')->widget(Select2::className(), [
                    'data' => $languages,
                    'pluginOptions' => [
                        'tags' => true
                    ]
                ]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-5">
                <?= $form->field($model, 'type')->widget(Select2::className(), [
                        'data' => $types
                ]) ?>
            </div>
            <div class="col-lg-7">
                <?= $form->field($model, 'class')->widget(Select2::className(), [
                        'data' => $classes
                ]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'index')->textarea(['rows' => 6]) ?>
            </div>
        </div>

        <br>
        <br>

        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <br>
                    <br>
                    <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
                    <br>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <br>
        <br>
        <br>

    </div>
</div>
