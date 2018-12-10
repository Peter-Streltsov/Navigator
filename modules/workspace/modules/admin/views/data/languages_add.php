<?php

use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;

Pjax::begin(['enablePushState' => false]);
$form = new ActiveForm([
    'action' => '/control/admin/data/addlanguage',
    'method' => 'post',
]);
?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <?= Html::tag('h4', 'Добавить язык') ?>
    </div>
    <div class="panel panel-body">
        <?php
        ActiveForm::begin();
        ?>
        <div class="row">
            <div class="col-lg-10">
                <?= $form->field($language, 'language')->textInput()->label(''); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-default']); ?>
            </div>
        </div>

        <?php
        ActiveForm::end();
        ?>
    </div>
</div>

<?php Pjax::end(); ?>
