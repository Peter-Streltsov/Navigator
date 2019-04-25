<?php

use yii\helpers\Html;

?>

<p>
    <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
    <?= Html::a('Удалить статью', ['delete', 'id' => $model->id], [
        'class' => 'button danger big',
        'data' => [
            'confirm' => 'Удалить статью? (действие отменить невозможно)',
            'method' => 'post',
        ],
    ]) ?>
</p>