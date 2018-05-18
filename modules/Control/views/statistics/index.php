<?php

$this->title = 'Статистика';

?>

<?php
$this->params['breadcrumbs'][] = $this->title;
?>

<?=\yii\widgets\Breadcrumbs::widget(); ?>

<br>
<h3><?= $this->title ?></h3>
<br>
<br>


<h4>Базовые показатели</h4>
<br>
<div>
<?= \yii\widgets\DetailView::widget([
    'options' => [
            'class' => 'table'
        ],
    'model' => $basic,
    /*'attributes' => [
            'Meanindex' => 'Средний индекс'
    ]*/
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

    <?php
    echo \yii\widgets\DetailView::widget([
            'model' => $advanced
    ]);
    ?>



</div>
