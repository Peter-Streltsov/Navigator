<?php

/* @var $uploadsProvider \yii\data\ActiveDataProvider */
/* @var $this \yii\web\View */
/* @var $accepted \yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'Загруженные данные';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="">

    <br>

    <h3> <?= Html::encode($this->title); ?></h3>

    <br>
    <br>

    <?php

    Modal::begin([
            'toggleButton' => [
                    'label' => 'Принятые загрузки',
                    'class' => 'button primary big'
            ]
    ]);

    echo GridView::widget([
        'dataProvider' => $accepted,
        'tableOptions' => [
                'class' => 'table'
        ],
        'columns' => [
            'id',
            'title',
            'subtitle'
        ]
    ]);

    Modal::end();

    ?>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">

            <?php
            echo GridView::widget([
                'dataProvider' => $uploadsProvider,
                'tableOptions' => [
                    'class' => 'table'
                ],
                'columns' => [
                    'id',
                    'title',
                    'subtitle',
                    'description',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'accept' => function($url, $model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-user">' . '</span>',
                                    ['messages/accept', 'id' => $model->id],
                                    [
                                        'class' => 'button',
                                        'style' => 'border-radius: 2pc;'
                                    ]
                                );
                            }
                        ],
                        'template' => '{accept}'
                    ]
                ]
            ]);

            ?>

        </div>
    </div>
</div>
