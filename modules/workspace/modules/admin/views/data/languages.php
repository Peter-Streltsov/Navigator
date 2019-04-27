<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;

/* @var $languages yii\data\ActiveDataProvider */

?>

<?php \yii\widgets\Pjax::begin(['enablePushState' => false]); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4 style="color: gray;">Список сохраненных языков</h4>
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
                            '<span style="color: lightgreen;" class="glyphicon glyphicon-plus">  <t style="color: gray;">Добавить язык</t></span>',
                            ['/workspace/admin/data/addlanguage'],
                            ['class' => 'btn btn-default']
                        );?>

                        <?php Pjax::end(); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-8">
                        <?php

                        echo GridView::widget([
                            'dataProvider' => $languages,
                            'tableOptions' => [
                                'style' => 'color: gray;',
                                'class' => 'table table-hover'
                            ],
                            'layout' => '{items}',
                            'columns' => [
                                [
                                    'attribute' => 'language',
                                    'label' => ''
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'buttons' => [
                                        'update' => function($url, $model) {
                                            return Html::a(
                                                    '<span class="glyphicon glyphicon-pencil"></span>',
                                                    '/workspace/admin/orgdata/language_update?id=' . $model->id
                                            );
                                        },
                                        'delete' => function($url, $model) {
                                            return Html::a(
                                                    '<span class="glyphicon glyphicon-trash"></span>',
                                                    '/workspace/admin/orgdata/language_delete?id=' . $model->id,
                                                    ['data' => ['method' => 'post']]
                                            );
                                        }
                                    ],
                                    'template' => '{update} {delete}'
                                ],
                            ]
                        ])

                        ?>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end(); ?>

<br>
<br>
<br>
