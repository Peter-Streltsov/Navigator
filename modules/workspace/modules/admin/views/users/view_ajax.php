<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\identity\Users */

$this->registerJsFile('/js/modules/admin/routes/users_view.js');
$this->title = $model->name . ' ' . $model->lastname;
//$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $model->name.' '.$model->lastname;
?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4><?= Html::encode('Данные пользователя - ' . $model->name.' '.$model->lastname) ?>
    </div>
    <div class="panel panel-body">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <?= Html::button('<span class="glyphicon glyphicon-chevron-left"> Назад к списку пользователей</span>', [
                    'id' => 'backtouserlist',
                    'class' => 'btn btn-default']);
                ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-5">
                <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], [
                    'class' => 'button primary big',
                    'style' => 'width: 20pc;',
                ]) ?>
                <br>
                <?= Html::a('Удалить пользователя', ['delete', 'id' => $model->id], [
                    'class' => 'button danger big',
                    'style' => 'width: 20pc;',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <br>
            </div>
            <div class="col-lg-5">
                <?php
                if (!$model->getStaff()) {
                    echo Html::a('Добавить в категорию "сотрудники"', ['/workspace/admin/users/makestaff', 'id' => $model->id], [
                        'class' => 'button primary big',
                        'style' => 'width: 20pc;',
                    ]);
                }
                ?>
                <br>
                <?php
                if (!$model->getAuthor()) {
                    echo Html::a('Создать автора', ['users/makeauthor', 'id' => $model->id], [
                        'class' => 'button primary big',
                        'style' => 'width: 20pc;',
                    ]);
                }
                ?>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-12">
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'class' => 'table',
                        'style' => 'width: 30pc;'
                    ],
                    'attributes' => [
                        'id',
                        'username',
                        'name',
                        'lastname',
                        'role',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
