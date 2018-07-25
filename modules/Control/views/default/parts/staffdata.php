<?php

use miloschuman\highcharts\Highcharts;
use yii\widgets\DetailView;

?>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">

        <?php

        Yii::$app->request;

        echo Highcharts::widget([
            'scripts' => [
                //'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'style' => 'width: 20pc;',
                'labels' => [
                    'items' => [
                        'html' =>'test chart'
                    ]
                ],
                'series' => [
                    [
                        //'type' => '',
                        'name' => 'Авторы и сотрудники',
                        'data' => [
                            /*[
                                'name' => 'Статьи',
                                'y' => (int)$employee['articles'],
                            ],
                            [
                                'name' => 'Монографии',
                                'y' => (int)$data['monographies'],
                                'color' => new \yii\web\JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "gray"')
                            ],
                            [
                                'name' => 'Научные мероприятия (конференции, доклады)',
                                'y' => 1
                            ]*/
                        ],
                    ],
                ],
                'credits' => ['enabled' => false]
            ],
        ]);

        ?>

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
                        'model' => $employee,
                        'options' => [
                            'class' => 'table'
                        ],
                        'attributes' => [
                            'personnel' =>
                                [
                                    'label' => 'Всего сотрудников',
                                    'value' => $employee['personnel']
                                ],
                            'phd' =>
                                [
                                    'label' => 'Кандидатов наук',
                                    'value' => $employee['phd']
                                ],
                            'users' =>
                                [
                                    'label' => 'Зарегистрировано пользователей',
                                    'value' => $employee['users']
                                ],
                        ]
                    ]);

                    ?>
                </div>
            </div>
        </div>

    </div>
</div>