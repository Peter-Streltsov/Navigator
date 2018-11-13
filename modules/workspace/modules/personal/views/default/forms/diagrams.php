<?php

use yii\helpers\Html;

?>

<div class="row">
    <div class="col-lg-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= Html::button('<span class="glyphicon glyphicon-send"></span>');?>
                <br>
                <br>
                <?= Html::button('<span class="glyphicon glyphicon-equalizer"></span>');?>
                <br>
                <br>
                <!--<?= Html::button('<span class="glyphicon glyphicon-send"></span>');?>
                <br>
                <br>-->
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>Распределение научных результатов</h5>
            </div>
            <div class="panel panel-body">

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
                        'yAxis' => [
                            'title' => ['Количество']
                        ],
                        'xAxis' => [
                            'categories' => ['Статьи', 'Индекс - статьи', 'Монографии', 'Участие в научных мероприятиях']
                        ],
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
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Индекс - статьи',
                                'data' => [0, $indexes['articles'], 0, 0]
                            ],*/
                            [
                                'type' => 'column',
                                'name' => 'Монографии',
                                'data' => [0, 0, 2, 0],
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Научные мероприятия',
                                'data' => [0, 0, 0, 1],
                            ]
                        ],
                        'credits' => ['enabled' => false]
                    ],
                ]);
                ?>

            </div>
        </div>
    </div>
</div>