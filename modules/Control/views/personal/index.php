<?php

use yii\helpers\Html;

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

<!-- upper buttons -->
<div class="row">
    <div class="col-lg-10">
        <?= Html::a('Сообщение <span class="glyphicon glyphicon-send"></span>', ['/control/messages/create'], ['class' => 'button primary big']); ?>
        <?= Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/control/upload/create'], ['class' => 'button primary big']) ?>
    </div>
</div>
<!-- end block -->

<br>
<br>
<br>
<br>


<!-- basic user information -->
<?= $this->render('forms/commondata', [
        'personal' => $personal
]) ?>
<!-- end block -->

<br>

<!---->
<?= $this->render('forms/panels', [
    'indexes' => $indexes,
    'currentarticles' => $currentarticles,
    'meanindex' => $meanindex
]); ?>
<!-- end block -->

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
