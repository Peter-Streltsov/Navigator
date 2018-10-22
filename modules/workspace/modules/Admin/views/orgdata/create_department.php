<?php

use yii\widgets\ActiveForm;

?>


<?php
$form = new ActiveForm([
    'action' => '/control/admin/orgdata/createdepartment',
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
        <?= \yii\helpers\Html::submitButton('Сохранить'); ?>
    </div>
</div>

<?php \yii\helpers\Html::endForm(); ?>

<br>
<br>
<br>
<br>
<br>
