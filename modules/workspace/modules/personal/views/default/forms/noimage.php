<?php

use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="alert alert-danger">
            Изображение не загружено
        </div>
        <br>
        <br>
        <?= Html::button('Загрузить фотографию', ['id' => 'imageload']) ?>
        <br>
    </div>
</div>