<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>
<br>
<br>
<br>

<div class="well">
    <div class="row">
        <div class="col-lg-5">

        </div>
        <div class="col-lg-7">
            <?= Html::encode('Списки сохраненных данных') ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-5">

        </div>
        <div class="col-lg-7">
            <?= Html::dropDownList('', '', [
                '<a>Сохраненные языки</a>',
                '<a href="/control">Сохраненные журналы</a>'
            ]) ?>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Данные организации</h4>
            </div>
            <div class="panel panel-body">
                <br>
                <br>

                <div class="row">
                    <div class="col-lg-5">
                        <?= Html::a('Редактировать', 'orgdata/update', ['class' => 'button primary big']); ?>
                    </div>
                    <div class="col-lg-3">
                        Название
                    </div>
                    <div class="col-lg-4">
                        <div class="form-control">
                            <?= $model->organisation; ?>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-5">

                    </div>
                    <div class="col-lg-3">
                        Ссылка на сетевой ресурс организации
                    </div>
                    <div class="col-lg-4">
                        <div class="form-control">
                            <?= $model->weblink; ?>
                        </div>
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
