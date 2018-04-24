<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = 'Добавить диссертацию';
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-create">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <div class="dissertations-form">

        <div class="row">

            <div class="col-lg-10">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'author')->dropDownList(\yii\helpers\ArrayHelper::map($authors, 'name', 'name')) ?>
            </div>

        </div>


        <div class="row">

            <div class="col-lg-5">
            <?= $form->field($model, 'date')->textInput() ?>
            </div>

            <div class="col-lg-5">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            </div>

        </div>


        <div class="row">

            <div class="col-lg-10">
            <?= $form->field($model, 'organisation')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'speciality')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'opponents')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'annotation')->textarea(['rows' => 6]) ?>
            </div>

        </div>

            <br>
            <br>
        </div>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
            </div>

            <?php ActiveForm::end(); ?>

    </div>
