<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<?php Pjax::begin(['enablePushState' => false]); ?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Данные организации</h4>
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-10">
                <?= Html::a('Редактировать', '/workspace/admin/orgdata/update', ['class' => 'button primary big']); ?>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-5">
                Название
            </div>
            <div class="col-lg-7">
                <div class="form-control">
                    <?= $model->organisation; ?>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-5">
                Ссылка на сетевой ресурс организации
            </div>
            <div class="col-lg-7">
                <div class="form-control">
                    <?= $model->weblink; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php Pjax::end(); ?>
