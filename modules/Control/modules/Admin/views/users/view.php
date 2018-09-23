<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name.' '.$model->lastname;
?>
<div style="min-height: 30pc; background-color: #fff;">

    <div class="row">
        <div class="col-lg-12">
            <h3><?= Html::encode($model->name.' '.$model->lastname) ?>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], [
                'class' => 'button primary big',
                'style' => 'width: 20pc;',
            ]) ?>
            <?= Html::a('Удалить пользователя', ['delete', 'id' => $model->id], [
                'class' => 'button danger big',
                'style' => 'width: 20pc;',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <?= Html::a('Добавить в категорию "сотрудники"', ['users/makestaff', 'id' => $model->id], [
                'class' => 'button primary big',
                'style' => 'width: 20pc;',
            ]); ?>
            <?= Html::a('Создать автора', ['users/makeauthor', 'id' => $model->id], [
                'class' => 'button primary big',
                'style' => 'width: 20pc;',
            ]); ?>
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
                    //'password',
                    'name',
                    'lastname',
                    'access_token',
                ],
            ]) ?>
        </div>
    </div>

</div>
