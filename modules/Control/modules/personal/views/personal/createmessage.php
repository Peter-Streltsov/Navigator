<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Messages */
/* @var $classes  */

$this->title = 'Создать сообщение';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-create">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <h4><?= 'Пользователь - '; ?><span style="color: #32a873" class="glyphicon">  <?=$model->username ?></span></h4>

    <br>
    <br>

    <?= $form->field($model, 'category')->dropDownList(\yii\helpers\ArrayHelper::map($classes, 'id', 'class')) ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 8]) ?>

    <br>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>