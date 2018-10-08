<?php

use yii\helpers\Html;

$this->title = 'Администрирование';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/admin_module.js');

?>

<br>
<br>

<div></div>

<br>

<div id="page-menu">
    <div class="well">
        <div class="row">
            <div class="col-lg-4">
                <?= Html::button('Данные организации', ['style' => 'width: 30vh;', 'id' => 'organisation', 'class' => 'btn btn-default']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::button('Список отделов', ['style' => 'width: 30vh;', 'id' => 'departments', 'class' => 'btn btn-default']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::button('Список сохраненных языков', ['style' => 'width: 30vh;', 'id' => 'languages','class' => 'btn btn-default']) ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <?= Html::button('Перечень должностей', ['style' => 'width: 30vh;', 'id' => 'positions', 'class' => 'btn btn-default']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::button('Список пользователей', ['style' => 'width: 30vh;', 'id' => 'users', 'class' => 'btn btn-default']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::button('Список сохраненных журналов', ['style' => 'width: 30vh;', 'id' => 'magazines', 'class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<!-- -->
<div id="holder">

</div>

<br>
<br>
<br>
