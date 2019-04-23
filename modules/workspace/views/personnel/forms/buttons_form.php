<?php

use yii\helpers\Html;

/* @var $model app\models\identity\Personnel */

?>

<div class="row">
    <div class="col-lg-10">
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Удалить сотрудника?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
</div>