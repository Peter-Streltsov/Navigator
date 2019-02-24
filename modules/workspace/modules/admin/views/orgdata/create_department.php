<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>

<?php Pjax::begin(); ?>
<?php
$form = ActiveForm::begin([
    'action' => '/workspace/admin/orgdata/department-make',
    'method' => 'post'
]);
?>
<br>
<br>
<div class="row">
    <div class="col-lg-1">

    </div>
    <div class="col-lg-10">
        <?= $form->field($department, 'department')->textInput()->label('Введите название отдела:') ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-1">

    </div>
    <div class="col-lg-5">
        <?= Html::submitButton('Сохранить'); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php Pjax::end(); ?>

<?php
var_dump($department);
?>

<br>
<br>
<br>
<br>
<br>
