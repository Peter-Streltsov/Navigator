<?php

use yii\helpers\Html;
use yii\web\JsExpression;

?>

<div class="row">
    <div class="col-lg-12">
                    <?php
                    echo \miloschuman\highcharts\Highcharts::widget([
                        'scripts' => [
                            'modules/exporting',
                            'themes/grid-light',
                        ],
                        'options' => [
                            'title' => [
                                'text' => ''
                            ],
                            'tooltip' => [
                                'formatter' => new JsExpression('function(){
                                        return this.series.name;
                                 }')
                            ],
                            'yAxis' => [
                                'title' => ['Количество']
                            ],
                            /*'xAxis' => [
                                'categories' => ['Статьи', 'Индекс - статьи', 'Монографии', 'Участие в научных мероприятиях']
                            ],*/
                            'labels' => [
                                'items' => [
                                    'html' =>'test chart'
                                ]
                            ],
                            'series' => [
                                /*[
                                    'type' => 'column',
                                    'name' => 'Статьи',
                                    'data' => [(int)count($articles), 0, 0],
                                ],*/
                                [
                                    'type' => 'pie',
                                    'name' => ['Публикации'],
                                    'data' => [
                                        ['name' => 'Монографии', 'y' => 2],
                                        ['name' => 'Статьи - публикации в журналах', 'y' => 1],
                                        ['name' => 'Статьи - материалы конференций', 'y' => 1],
                                        ['name' => 'Статьи в сборниках и главы книг', 'y' => 1],
                                        ['name' => 'Диссертации', 'y' => 1]
                                    ],
                                ],
                            ],
                            'credits' => ['enabled' => false]
                        ],
                    ]);
                    ?>
    </div>
</div>