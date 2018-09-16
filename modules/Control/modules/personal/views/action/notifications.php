<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this \yii\web\View */
/* @var $notifications \yii\data\ActiveDataProvider */

$this->title = 'Уведомления';
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['personal']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= GridView::widget([
        'dataProvider' => $notifications,
        'tableOptions' => [
            'class' => 'table'
        ],
        'columns' => [
            'text',
            'from'
        ]
    ]); ?>

</div>
