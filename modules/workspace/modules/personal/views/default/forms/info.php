<?php

use yii\helpers\Html;

?>

<div class="well">
    <?php
    if ($author->id != null) {
        echo Html::tag('text', 'Автор', ['style' => 'color: green;']);
    } else {
        echo Html::tag('text', 'Автор не сопоставлен', ['style' => 'color: red;']);
    }
    ?>
    <div align="right">
        <?= Html::a('Подробнее>>>', '#', ['style' => 'font-size: 12px;']) ?>
    </div>
</div>