<?php

use yii\grid\GridView;

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Список отделов</h4>
            </div>
            <?php
            \yii\widgets\Pjax::begin([
                    'enablePushState' => false
            ]);
            ?>
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-lg-5">
                        <?= \yii\helpers\Html::a('Добавить отдел', ['orgdata/createdepartment'], ['class' => 'button primary big']); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        echo GridView::widget([
                            'dataProvider' => $departments,
                            'tableOptions' => [
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
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/control/admin/orgdata/updatedepartment?id=' . $model->id);
                                        },
                                        'delete' => function($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/control/admin/orgdata/deletedepartment?id=' . $model->id, ['data' => ['method' => 'post']]);
                                        }
                                    ],
                                    'template' => '{update} {delete}'
                                ],
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
\yii\widgets\Pjax::end();
?>

<br>
<br>
<br>
