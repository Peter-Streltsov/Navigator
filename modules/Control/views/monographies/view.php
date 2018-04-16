<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Monographies */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monographies-view">

    <h3><?= Html::encode($this->title) ?></h3>

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
            'title',
            'subtitle',
            'year',
            'doi',
            'file',
        ],
    ]) ?>

</div>
