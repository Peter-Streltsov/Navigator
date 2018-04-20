<?php
/* @var $this yii\web\View */
?>

<?php $this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname ?>

<h3><?= \yii\bootstrap\Html::encode($this->title); ?></h3>

<br>
<br>
<br>

<?= \yii\helpers\Html::a('Сообщение <span class="glyphicon glyphicon-send"></span>', ['/control/messages/create'], ['class' => 'button primary big']); ?>
<?= \yii\helpers\Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/control/upload/create'], ['class' => 'button primary big']) ?>

<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Публикаций в текущем году: <?= count($currentarticles) ?>
                </b>
            </div>
            <div class="panel-body">
                <br>
                Статей: <?= count($currentarticles) ?>
                <br>
                Монографий: 0
                <br>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Индекс ПНРД за <?= date('Y') ?> год: <?= $indexes['articles'] ?>
                </b>
            </div>
            <div class="panel-body">
                <br>
                Статей: <?= count($currentarticles) ?>
                <br>
                Монографий: 0
                <br>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Распределение научных результатов   <span class="glyphicon glyphicon-arrow-down"></span></a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">

                <?php

                echo \miloschuman\highcharts\Highcharts::widget([
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
                            'categories' => ['Статьи', 'Индекс - статьи', 'Монографии', 'Участие в научных мероприятиях']
                        ],
                        'labels' => [
                            'items' => [
                                'html' =>'test chart'
                            ]
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Статьи',
                                'data' => [(int)count($articles), 0, 0],
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Индекс - статьи',
                                'data' => [0, $indexes['articles'], 0, 0]
                            ],
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
            <div class="panel-footer"></div>
        </div>
    </div>
</div>


<br>
<br>
<br>

<div class="panel panel-default">
<?php $personaldata =  \yii\widgets\DetailView::widget([
        'model' => $personal,
    'options' => [
            'class' => 'table'
    ],
    'attributes' => [
        'lastname',
        'name',
        'secondname',
        'age',
        'position',
    ]
]);

$articlesview = \yii\grid\GridView::widget([
    'dataProvider' => $dataprovider,
    'columns' => [
        'title',
        'subtitle',
        'year'
    ]
]);


echo \yii\bootstrap\Tabs::widget([
        'items' => [
                [
                    'label' => 'Персональные данные',
                    'content' => $personaldata
                ],
                [
                        'label' => 'Статьи (за все время)',
                    'content' => $articlesview
                ]
            ]
]);


?>
</div>
