<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\messages\Message */
/* @var $classes  */

$this->title = 'Создать сообщение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-create">

    <br>

    <div class="row">
        <div class="col-lg-12">
            <h3><?= Html::encode($this->title) ?></h3>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <h4><?= 'Пользователь - '; ?><span style="color: #32a873" class="glyphicon">  <?=$model->username ?></span></h4>
        </div>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'category')
                ->dropDownList(\yii\helpers\ArrayHelper::map($classes, 'id', 'class')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'custom_theme')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'text')->textarea(['rows' => 8]) ?>
        </div>
    </div>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>