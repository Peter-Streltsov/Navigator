<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Authors */

$this->title = $model->name . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs']['homelink'] = ['label' => 'Панель управления'];
?>
<div class="authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>
    <br>

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
        ],
    ]) ?>

</div>
