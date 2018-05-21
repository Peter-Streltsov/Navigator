<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Messages */

$this->title = 'Новое сообщение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <h4><?= 'Сообщение от пользователя ' . $model->username ?></h4>

    <br>
    <br>

    <?= $form->field($model, 'category')->dropDownList(\yii\helpers\ArrayHelper::map($classes, 'id', 'class')) ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 8]) ?>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button primary big']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

</div>
