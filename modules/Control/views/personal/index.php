<?php
/* @var $this yii\web\View */
?>

<?php $this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname ?>

<h3><?= \yii\bootstrap\Html::encode($this->title); ?></h3>

<br>
<br>
<br>

<?= \yii\helpers\Html::a('Сообщение', 'control/personal/message', ['class' => 'button primary big']); ?>

<br>
<br>
<br>

<?php

echo \miloschuman\highcharts\Highcharts::widget([
    'scripts' => [
        //'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Распределение научных результатов'
        ],
        'yAxis' => [
                'title' => ['Количество']
],
        'xAxis' => [
                'categories' => ['Статьи', 'Монографии', 'Участие в научных мероприятиях']
        ],
        'labels' => [
            'items' => [
                'html' =>'test chart'
            ]
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Статьи',
                'data' => [(int)count($articles), 0, 0],
            ],
            [
                    'type' => 'column',
                'name' => 'Монографии',
                'data' => [0, 2, 0],
            ],
            [
                    'type' => 'column',
                'name' => 'Научные мероприятия',
                'data' => [0, 0, 1],
            ]
        ],
        'credits' => ['enabled' => false]
    ],
]);

?>

<br>
<br>
<br>

<h4>Персональные данные</h4>
<br>
<br>

<?= \yii\widgets\DetailView::widget([
        'model' => $personal
]);
?>

<br>
<br>

<h4>Опубликованные статьи</h4>

<?php echo \yii\grid\GridView::widget([
        'dataProvider' => $dataprovider,
        'columns' => [
                'title',
                'subtitle',
            'year'
        ]
        ]);

?>
