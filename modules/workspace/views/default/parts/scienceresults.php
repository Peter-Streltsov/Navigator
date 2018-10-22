<?php

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\widgets\DetailView;

?>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                Распределение по типам публикаций
            </div>
            <div class="panel-body">
                <?php

                Yii::$app->request;

                echo Highcharts::widget([
                    'scripts' => [
                        //'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            //'text' => 'Распределение научных результатов'
                        ],
                        'style' => 'width: 20pc;',
                        'labels' => [
                            'items' => [
                                'html' =>'test chart'
                            ]
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Распределение научных результатов',
                                'data' => [
                                    [
                                        'name' => 'Статьи',
                                        'y' => (int)$science['articles'],
                                    ],
                                    [
                                        'name' => 'Монографии',
                                        'y' => (int)$science['monographies'],
                                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "gray"')
                                    ],
                                    [
                                        'name' => 'Научные мероприятия (конференции, доклады)',
                                        'y' => 1
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

    </div>
</div>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">

                    <?php

                    echo DetailView::widget([
                        'model' => $science,
                        'options' => [
                            'class' => 'table'
                        ],
                        'attributes' => [
                            'publications' =>
                                [
                                    'label' => 'Всего публикаций (всех типов)',
                                    'value' => $science['publications']
                                ],
                            'articles' => [
                                'label' => 'Статей',
                                'value' => $science['articles']
                            ],
                            'monographies' => [
                                'label' => 'Монографий',
                                'value' => $science['monographies']
                            ],
                            'disserttions' => [
                                'label' => 'Диссертаций',
                                'value' => $science['dissertations']
                            ]
                        ]
                    ]);

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>