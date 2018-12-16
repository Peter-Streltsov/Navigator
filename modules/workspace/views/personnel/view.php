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

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-10">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-10">
            <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'button danger big',
                'data' => [
                    'confirm' => 'Удалить сотрудника?',
                    'method' => 'post',
                    ],
                ]) ?>
        </div>
    </div>

    <br>
    <br>
    <br>

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
                    [
                        'attribute' => 'habilitation',
                        'value' => function ($model) {
                            return $model->habilitationValue;
                        }
                    ],
                    //'habilitation',
                    'employment',
                    'expirience',
                    'age',
                ],
            ]) ?>
        </div>
    </div>

</div>

<?php
