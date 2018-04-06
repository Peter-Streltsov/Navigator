<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Индексы ПНРД - статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indexes-articles-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <br>
    <?php Pjax::begin(); ?>

    <?php
    //var_dump($chartdata);

    foreach ($chartdata as $key => $serie) {
        $data[] = [
                'type' => 'column',
                'name' => $serie['description'],
                'data' => [(float)$serie['value']]
        ];
        //var_dump($data[$key]);
        //echo "<br>";
    }

    //var_dump($data);

    ?>

    <?php

    echo \miloschuman\highcharts\Highcharts::widget([
        'scripts' => [
            //'themes/grid-light',
        ],
            'options' => [
                    'title' => [
                            'text' => 'Соотношение индексов'
                    ],
                    'series' => $data,
                'center' => [200, 80],
                'size' => 150,
                'credits' => ['enabled' => false]
            ]
    ]);

    ?>

    <br>
    <br>

    <p>
        <?= Html::a('Создать новый индекс', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'description:ntext',
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>