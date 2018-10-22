<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Positions */

$this->title = $model->position;
$this->params['breadcrumbs'][] = ['label' => 'Список должностей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'position',
        ],
    ]) ?>

</div>
