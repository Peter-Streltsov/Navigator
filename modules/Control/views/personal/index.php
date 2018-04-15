<?php
/* @var $this yii\web\View */
?>

<?php $this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname ?>

<h3><?= \yii\bootstrap\Html::encode($this->title); ?></h3>

<br>
<br>
<br>

<?= \yii\helpers\Html::a('Сообщение', '/control/message', ['class' => 'button primary big']); ?>
<?= \yii\helpers\Html::a('Загрузить данные', ['/control/upload/create'], ['class' => 'button primary big']) ?>

<br>
<br>
<br>

<center>
<div style="width: 50pc;">
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
</div>
</center>

<br>
<br>
<br>

<?php $personaldata =  \yii\widgets\DetailView::widget([
        'model' => $personal,
    'options' => [
            'class' => 'table'
    ]
]);

$articlesview = \yii\grid\GridView::widget([
    'dataProvider' => $dataprovider,
    'columns' => [
        'title',
        'subtitle',
        'year'
    ]
]);


echo \yii\bootstrap\Tabs::widget([
        'items' => [
                [
                    'label' => 'Персональные данные',
                    'content' => $personaldata
                ],
                [
                        'label' => 'Опубликованные статьи',
                    'content' => $articlesview
                ]
            ]
]);


?>
