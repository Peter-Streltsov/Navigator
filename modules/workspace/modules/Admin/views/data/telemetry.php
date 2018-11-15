<?php

use yii\grid\GridView;

$this->registerJsFile('/js/modules/admin/filter.js');

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Пользователи и запросы</h4>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="well">
                <div class="form-group">
                    <label for="usr">Поиск:</label>
                    <input type="text" class="form-control" id="searchinput">
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-12">
                <?php
                echo GridView::widget([
                    'dataProvider' => $telemetry,
                    'id' => 'syntable'
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
