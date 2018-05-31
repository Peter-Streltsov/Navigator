<?php
/* @var $this yii\web\View */
/* @var $indexes  */
/* @var $model \app\modules\Control\models\Users|array|null */
/* @var $personal \app\modules\Control\models\Personnel|array|null */
/* @var $meanindex float */
/* @var $articles array */
/* @var $currentarticles array */
/* @var $dataprovider \yii\data\ArrayDataProvider */
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
        <?= \yii\widgets\DetailView::widget([
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
        'habilitation'
    ]
]);
        ?>
    </div>
    <div class="col-xs-12 col-md-5">
        <img style="width: 15pc; height: 20pc;" src="/images/1.jpg" class="img-rounded">
    </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    Научные показатели за <?= date('Y') ?> год:
                </b>
            </div>
            <div class="panel-body">
                <br>
                <b style="color: red;">
                    Индекс ПНРД за <?= date('Y') ?> год: <?= $indexes['articles'] ?>
                </b>
                (Средний индекс ПНРД - <b><?= $meanindex ?></b>)
                <br>
                <br>
                <b>
                    Публикаций в текущем году: <?= count($currentarticles) ?>
                </b>
                <br>
                <br>

                <table class="table">
                    <thead>
                    <th>Категория</th>
                    <th>Опубликовано</th>
                    <th>Индекс</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Статьи
                        </td>
                        <td>
                            <?= count($currentarticles) ?>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Монографии
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Участие в научных конференциях
                        </td>
                        <td>
                            0
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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
<?php

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
                    'label' => 'Статьи (за все время)',
                    'content' => $articlesview
                ],
                [
                        'label' => 'Монографии (за все время)'
                ]
            ]
]);


?>
</div>
