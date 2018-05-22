<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Upload */
/* @var $form yii\widgets\ActiveForm */
/* @var $file mixed|string */
/* @var $author  */
/* @var $classes  */
/* @var $user null|\yii\web\IdentityInterface */
?>


<div style="margin-left: 3pc; width: 50pc;" class="form-group-sm">

    <br>
    <br>

    <?php $form = ActiveForm::begin(); ?>

    <div><?= $form->field($model, 'author_id')->textInput(['value' => $author->id, 'readonly' => true]) ?></div>

    <br>

    <h5>Запрос на добавление:</h5>
    <?= $form->field($model, 'class')->dropDownList($classes); ?>

    <br><br>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($file, 'uploadedfile')->fileInput([
        'class' => 'btn btn-default',
        'multiple' => true
        //'label' => 'title'
    ]) ?>

    <!--<?= $form->field($model, 'accepted')->textInput() ?>-->

    <br><br>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>