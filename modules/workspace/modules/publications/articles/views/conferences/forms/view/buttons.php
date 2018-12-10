<?php

use yii\helpers\Html;

?>

<p>
    <?= Html::a("Редактировать <span class='glyphicon glyphicon-edit'></span>", ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
    <?= Yii::$app->access->isSupervisor() ? Html::a("Удалить <span class='glyphicon glyphicon-remove-circle'></span>", ['delete', 'id' => $model->id], [
        'class' => 'button primary danger big',
        'data' => [
            'confirm' => 'Подтверждение - удалить статью?',
            'method' => 'post',
        ],
    ]) : '';
    ?>
</p>
