<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Индексы ПНРД - статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indexes-articles-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <br>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать новый индекс', ['create', 'class' => 'articles'], ['class' => 'button primary big']) ?>
    </p>

    <br>
    <br>
    <br>

    <?php

    echo \miloschuman\highcharts\Highcharts::widget([
        'scripts' => [
            'themes/grid-light',
        ],
        'options' => [
            'title' => [
                'text' => 'Текущее соотношение индексов'
            ],
            'xAxis' => [
                'categories' => array_values(array_map(function($item) { return $item['description']; }, $columns))
            ],
            'yAxis' => [
                'title' => ''
            ],
            'series' => [
                [
                    'type' => 'column',
                    'name' => 'Индексы',
                    'data' => array_values(array_map(function($item) { return (float)$item['value']; }, $columns))
                ]

            ],
            'labels' => [
                'items' => [
                    'html' =>'test chart'
                ]
            ],
            'size' => 50,
            'credits' => ['enabled' => false],
            //'showInLegend' => false,
        ],
    ]); ?>

    <br>
    <br>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [

            'id',
            'description:ntext',
            'value',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
