<?php

use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use miloschuman\highcharts\Highcharts;

/* @var $data  */
/* @var $this \yii\web\View */
/* @var $table array */

$this->title = 'Общие сведения';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="Control-default-index">

    <br>

    <h3>Общие сведения</h3>

    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-1">

            <br>
            <br>
            <br>

            <?php

            Modal::begin([
                'toggleButton' => [
                    'label' => '<span class="glyphicon glyphicon-info-sign" "></span>',
                    'style' => 'border-radius: 1pc;',
                    'class' => 'button primary big'
                ]
            ]);

            Modal::end();


            ?>

            <br>
            <br>

            <?php

            Modal::begin([
                'toggleButton' => [
                    'label' => '<span class="glyphicon glyphicon-info-sign" "></span>',
                    'style' => 'border-radius: 1pc;',
                    'class' => 'button primary big'
                ]
            ]);

            echo Highcharts::widget([
                'scripts' => [
                    //'modules/exporting',
                    'themes/grid-light',
                ],
                'options' => [
                    'title' => [
                        'text' => 'Распределение научных результатов'
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
                                    'y' => (int)$data['articles'],
                                ],
                                [
                                    'name' => 'Монографии',
                                    'y' => (int)$data['monographies'],
                                    'color' => new \yii\web\JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "gray"')
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

            Modal::end();

            ?>
        </div>
        <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel panel-body">
                    <?php

                    $user =  Yii::$app->user->getIdentity();

                    echo Highcharts::widget([
                        'scripts' => [
                            //'modules/exporting',
                            'themes/grid-light',
                        ],
                        'options' => [
                            'title' => [
                                'text' => 'Распределение научных результатов'
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
                                            'y' => (int)$data['articles'],
                                        ],
                                        [
                                            'name' => 'Монографии',
                                            'y' => (int)$data['monographies'],
                                            'color' => new \yii\web\JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "gray"')
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

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">

                        <?php

                        //echo "<br><br><br>";

                        echo DetailView::widget([
                            'model' => $table,
                            'options' => [
                                'class' => 'table'
                            ],
                            'attributes' => [
                                'publications' =>
                                    [
                                        'label' => 'Всего публикаций (всех типов)',
                                        'value' => $table['publications']
                                    ],
                                'articles' => [
                                    'label' => 'Статей',
                                    'value' => $table['articles']
                                ],
                                'monographies' => [
                                    'label' => 'Монографий',
                                    'value' => $table['monographies']
                                ],
                                'disserttions' => [
                                    'label' => 'Диссертаций',
                                    'value' => $table['dissertations']
                                ]
                            ]
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">

                        <?php

                        //echo "<br><br><br>";

                        echo \yii\widgets\DetailView::widget([
                            'model' => $table,
                            'options' => [
                                'class' => 'table'
                            ],
                            'attributes' => [
                                'personnel' =>
                                    [
                                        'label' => 'Всего сотрудников',
                                        'value' => $table['personnel']
                                    ],
                                'phd' =>
                                    [
                                        'label' => 'Кандидатов наук',
                                        'value' => $table['phd']
                                    ],
                                'users' =>
                                    [
                                        'label' => 'Зарегистрировано пользователей',
                                        'value' => $table['users']
                                    ],
                            ]
                        ]);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
