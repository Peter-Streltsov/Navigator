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
                                [
                                    'type' => 'pie',
                                    'name' => ['Публикации'],
                                    'data' => [
                                        [
                                            'name' => 'Монографии',
                                            'y' => 0
                                        ],
                                        [
                                            'name' => 'Статьи - публикации в журналах',
                                            'y' => $personal->countArticlesJournals()
                                        ],
                                        [
                                            'name' => 'Статьи - материалы конференций',
                                            'y' => $personal->countArticlesConferences()
                                        ],
                                        [
                                            'name' => 'Статьи в сборниках и главы книг',
                                            'y' => $personal->countArticlesCollections()
                                        ],
                                        [
                                            'name' => 'Диссертации',
                                            'y' => $personal->countDissertations()
                                        ]
                                    ],
                                ],
                            ],
                            'credits' => ['enabled' => false]
                        ],
                    ]);
                    ?>
    </div>
</div>