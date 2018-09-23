<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\identity\Personnel */

$this->title = $model->name . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">

    <div class="row">
        <div class="col-lg-10">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'button danger big',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
                ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table'
                ],
                'attributes' => [
                    'id',
                    'name',
                    'secondname',
                    'lastname',
                    'position',
                    'habilitation',
                    'employment',
                    'expirience',
                    'age',
                ],
            ]) ?>
        </div>
    </div>

</div>
