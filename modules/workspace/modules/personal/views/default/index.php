<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $indexes  */
/* @var $model \app\modules\Control\models\Users|array|null */
/* @var $personal \app\modules\Control\models\Personnel|array|null */
/* @var $meanindex float */
/* @var $articles array */
/* @var $currentarticles array */
/* @var $dataprovider \yii\data\ArrayDataProvider */

$this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname;
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<h3><?= Html::encode($this->title); ?></h3>

<br>
<br>
<br>

<!-- upper buttons -->
<div class="row">
    <div class="col-lg-10">
        <?= Html::a('Сообщение <span class="glyphicon glyphicon-send"></span>', ['/control/personal/action/create', 'id' => $model->id], ['class' => 'button primary big']); ?>
        <!--<?= Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/control/personal/upload'], ['class' => 'button primary big']) ?>-->
        <?php

        Modal::begin([
                'toggleButton' => [
                    'label' => 'Загрузить данные <span class="glyphicon glyphicon-upload"></span>',
                    'class' => 'button primary big'
                ]
        ]);
        echo "Функция отключена в текущей версии";
        Modal::end();

        ?>
    </div>
</div>
<!-- end block -->

<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-6">
        <?php
        if ($personaldata->author != null) {
            echo \yii\widgets\DetailView::widget([
                'model' => $personaldata->author,
                'attributes' => [
                    'name',
                    'secondname',
                    'lastname',
                    'habilitation',
                    'user_id'
                ]
            ]);
        } else {
            echo "<br> Автор не сопоставлен";
        }
        ?>
    </div>
    <div class="col-lg-1">

    </div>
    <div id="photo-holder" class="col-lg-5">
        <?php
         if ($model->userpic == null) {
             $model->userpic = '<b style="color: red;">Изображение не загружено</b>';
         }
        ?>
        <?= $model->userpic ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">

    </div>
    <div class="col-lg-5">
        <?= Html::button('Загрузить фотографию') ?>
    </div>
</div>


<!-- basic user information -->
<?php
 /*echo $this->render('forms/commondata', [
    'personal' => $personal
]);*/
 ?>
<!-- end block -->

<br>

<!---->
<?php
 /*echo $this->render('forms/panels', [
    'indexes' => $indexes,
    'currentarticles' => $currentarticles,
    'meanindex' => $meanindex
]);*/
 ?>
<!-- end block -->

<br>
<br>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1">Распределение научных результатов</a>
            </h4>
        </div>
        <!--<div id="collapse1" class="panel-collapse collapse">-->
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
            <div class="panel-footer"></div>
        </div>
    </div>
<!--</div>-->


<br>
<br>
<br>

<div class="panel panel-default">
    <?php

    //var_dump($personaldata->author);

    /*$articlesview = \yii\grid\GridView::widget([
        'dataProvider' => $dataprovider,
        'columns' => [
            'title',
            'subtitle',
            'year'
        ]
    ]);*/


    /*echo \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => 'Статьи (за все время)',
                'content' => $articlesview
            ],
            [
                'label' => 'Монографии (за все время)'
            ]
        ]
    ]);*/


    ?>
</div>
