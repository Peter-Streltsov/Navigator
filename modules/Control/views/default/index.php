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
        <div class="col-lg-5">
            <?= \yii\helpers\Html::tag('b', $test['total']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <?php

            echo \yii\bootstrap\Tabs::widget([
                'items' => [
                    [
                        'label' => 'Распределение научных результатов',
                        'content' => $this->render('parts/scienceresults', [
                            'science' => $science,
                        ]),
                        'active' => true
                    ],
                    [
                        'label' => 'Сотрудники и авторы',
                        'content' => $this->render('parts/staffdata', [
                            'employee' => $employee
                        ])
                    ]
                ]
            ]);

            ?>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
