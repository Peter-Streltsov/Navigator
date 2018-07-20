<?php

use yii\widgets\ActiveForm;


$this->title = 'Сведения об организации - редактировать';
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<h3>Сведения об организации - редактировать</h3>

<br>
<br>
<br>

<?php

$form = ActiveForm::begin();

?>

<div class="row">
    <div class="col-lg-5">
        <?= $form->field($model, 'organisation')->textInput(); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <?= $form->field($model, 'weblink')->textInput(); ?>
    </div>
</div>

<?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'button primary big']); ?>

<?php ActiveForm::end(); ?>
