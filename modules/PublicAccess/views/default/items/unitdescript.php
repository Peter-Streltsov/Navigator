<?php

use yii\helpers\Html;

?>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div style="border-radius: 2vh; background-color: #dfe5df;" class="row">
            <div class="col-lg-1">
                <b># - </b><?= Html::tag('b', $model['id']) ?>
            </div>
            <div class="col-lg-3">
                <b style="color: green;">Заголовок</b>
                <br>
                <?= Html::tag('b', $model['title']) ?>
            </div>
            <div class="col-lg-3">
                <b style="color: green;">Издатель</b>
                <br>
                <?= Html::tag('b', $model['magazine']) ?>
            </div>
            <div class="col-lg-2">
                <b style="color: green">Год издания</b>
                <br>
                <?= Html::tag('b', $model['year']) ?>
            </div>
            <div class="col-lg-2">
                <br>
                <?= Html::button('<span class="glyphicon glyphicon-info-sign"></span>') ?>
                <?= Html::button('<span class="glyphicon glyphicon-export"></span>') ?>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>
<br>