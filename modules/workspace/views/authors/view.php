<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\JsExpression;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
/* @var $model app\models\identity\Authors */

$this->title = $model->name . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs']['homelink'] = ['label' => 'Панель управления'];
?>
<div class="authors-view">
    <br>
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <br>
    <br>
    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br>
    <br>
    <div class="row">
        <?php
        $userStatus = $model->hasUser() ? 'Пользователь сопоставлен' : 'Пользователь не сопоставлен';
        $userFlashClass = $model->hasUser() ? 'alert alert-success' : 'alert alert-warning';
        $personnelStatus = $model->hasPersonnel() ? '' : '';
        $personnelFlashStatus = $model->hasPersonnel() ? '' : '';
        ?>
        <div class="col-lg-5">
            <div class="<?= $userFlashClass ?>" role='alert'>
                <?= $userStatus; ?>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">

        </div>
        <div class="col-lg-1"></div>
    </div>
    <br>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table table-hover'
                ],
                'attributes' => [
                    'id',
                    'name',
                    'secondname',
                    'habilitation',
                    'lastname',
                    [
                        'attribute' => 'publications',
                        'label' => 'Публикаций',
                        'value' => function($model) {
                                    //$monographs = count($model->getMonographs());
                                    $articlesJournals = '';
                        }
                    ]
                ],
            ]) ?>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <?php

                    echo Highcharts::widget([
                        'scripts' => [
                            'modules/exporting',
                            'themes/grid-light',
                        ],
                        'options' => [
                            'title' => [
                                'text' => 'Распределение публикаций'
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
                                            'name' => 'Статьи (публикации в журналах)',
                                            'y' => count($model->articlesJournals),
                                        ],
                                        [
                                            'name' => 'Статьи (публикации материалов конференций)',
                                            'y' => count($model->articlesConferences)
                                        ],
                                        [
                                            'name' => 'Статьи (главы книг и монографий)',
                                            'y' => count($model->articlesCollections)
                                        ],
                                        [
                                            'name' => 'Монографии',
                                            //'y' => count($model->getMonographs()),
                                            'y' => 0
                                            //'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "gray"')
                                        ],
                                        [
                                            'name' => 'Диссертации',
                                            'y' => count($model->dissertations)
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
