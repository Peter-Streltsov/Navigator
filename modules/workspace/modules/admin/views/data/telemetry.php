<?php

use yii\widgets\Pjax;
use yii\grid\GridView;

$this->registerJsFile('/js/modules/admin/filter.js');

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Пользователи и запросы</h4>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-7">
            <div class="well">
                <div class="form-group">
                    <label for="usr">Поиск:</label>
                    <input type="text" class="form-control" id="searchinput">
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-body">
        <?php Pjax::begin(); ?>
        <div class="row">
            <div class="col-lg-12">
                <?php
                echo GridView::widget([
                    'dataProvider' => $telemetry,
                    'tableOptions' => [
                        'class' => 'table table-hover'
                    ],
                    'id' => 'syntable',
                    'columns' => [
                        'user' => [
                            'label' => 'Пользователь',
                            'value' => function ($model) {
                                        return $model->usermodel->name . ' ' . $model->usermodel->lastname;
                                }
                            ],
                        'ip',
                        'browser',
                        'path',
                        'created_at:datetime'
                    ]
                ]);
                ?>
            </div>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>
