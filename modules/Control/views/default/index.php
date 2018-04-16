<div class="Control-default-index">

    <h3>Общие сведения</h3>

    <br>
    <br>
    <br>

    <p>

        <?php

        $user =  Yii::$app->user->getIdentity();
        
        //\yii\helpers\VarDumper::dump($user);

        //\yii\helpers\VarDumper::dump(Yii::$app->access->isAdmin());


        echo \miloschuman\highcharts\Highcharts::widget([
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

        echo "<br><br><br>";

        echo \yii\widgets\DetailView::widget([
                'model' => $table,
            'options' => [
                    'class' => 'table'
            ],
            'attributes' => [
                    'personnel' =>
                        [
                            'label' => 'Сотрудников',
                            'value' => $table['personnel']
                            ],
                    'publications' =>
                    [
                            'label' => 'Всего публикаций (всех типов)',
                           'value' => $table['publications']
                    ],
                    'users' =>
                    [
                            'label' => 'Зарегистрировано пользователей',
                        'value' => $table['users']
                    ]
            ]
        ]);

        ?>
    </p>
</div>
