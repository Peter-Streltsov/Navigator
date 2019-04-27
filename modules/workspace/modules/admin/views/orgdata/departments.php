<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;

/* @var $departments yii\data\ActiveDataProvider */

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4 style="color: gray;">Список отделов</h4>
            </div>
            <div class="panel panel-body">
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        Pjax::begin([
                            'enablePushState' => false
                        ]);
                        ?>

                        <?= Html::a(
                                '<span style="color: lightgreen;" class="glyphicon glyphicon-plus">  <t style="color: gray;">Добавить отдел</t></span>',
                                ['orgdata/create-department'],
                                ['class' => 'btn btn-default']
                        );?>

                        <?php Pjax::end(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        echo GridView::widget([
                            'dataProvider' => $departments,
                            'tableOptions' => [
                                'style' => 'color: gray;',
                                'class' => 'table table-hover'
                            ],
                            'layout' => '{items}',
                            'emptyText' => 'Отделов не создано',
                            'columns' => [
                                [
                                    'attribute' => 'department',
                                    'label' => ''
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'buttons' => [
                                        'update' => function($url, $model) {
                                            return Html::a(
                                                    '<span class="glyphicon glyphicon-pencil"></span>',
                                                    '/control/admin/orgdata/updatedepartment?id=' . $model->id
                                            );
                                        },
                                        'delete' => function($url, $model) {
                                            return Html::a(
                                                    '<span class="glyphicon glyphicon-trash"></span>',
                                                    '/control/admin/orgdata/deletedepartment?id=' . $model->id,
                                                    ['data' => ['method' => 'post']]
                                            );
                                        }
                                    ],
                                    'template' => '{update} {delete}'
                                ],
                            ]
                        ]);
                        ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
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
