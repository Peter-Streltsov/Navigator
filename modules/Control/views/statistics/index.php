<?php

$this->title = 'Статистика';

?>

<br>
<h3><?= $this->title ?></h3>
<br>
<br>


<h4>Базовые показатели</h4>
<br>
<div>
<?= \yii\widgets\DetailView::widget([
    'model' => $basic
]); ?>


    <br>
    <br>
    <br>

    <?= \miloschuman\highcharts\Highcharts::widget([
        'scripts' => [
            //'modules/exporting',
            'themes/grid-light',
        ],
        'options' => [
            'title' => [
                'text' => ''
            ],
            'yAxis' => [
                'title' => ['Количество']
            ],
            'xAxis' => [
                'categories' => array_reverse(array_keys($timeline))
            ],
            'labels' => [
                'items' => [
                    'html' =>'test chart'
                ]
            ],
            'series' => [
                [
                    'type' => 'column',
                    'name' => 'Значение индекса',
                    'data' => array_values(array_reverse($timeline))
                ],
            ],
            'credits' => ['enabled' => false]
        ],
    ]) ?>

</div>
