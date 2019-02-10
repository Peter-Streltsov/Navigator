<?php

use yii\helpers\Html;

?>

<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <?php
            if ($author->id != null) {
                echo Html::tag('text', 'Автор', ['style' => 'color: lightgreen;']);
            } else {
                echo Html::tag('text', 'Автор не сопоставлен', ['style' => 'color: lightcoral;']);
            }
            ?>
            <div align="right">
                <?= Html::a('Подробнее>>>', ['/workspace/authors/view', 'id' => $author->id], ['style' => 'font-size: 12px;']) ?>
            </div>
            <hr>
            <?php
            if ($staff->id != null) {
                if ($staff->position == null) {
                    $position = 'Должность не задана!';
                    echo Html::tag('text', $position, ['style' => 'color: lightcoral;']);
                } else {
                    $position = $staff->position;
                    echo Html::tag('text', $position, ['style' => 'color: green;']);
                }
            } else {
                echo Html::tag('text', 'Сотрудник не сопоставлен', ['style' => 'color: lightcoral;']);
            }
            ?>
            <div align="right">
                <?= Html::a('Подробнее>>>', ['/workspace/personnel/view', 'id' => $author->id], ['style' => 'font-size: 12px;']) ?>
            </div>
        </div>
    </div>
</div>