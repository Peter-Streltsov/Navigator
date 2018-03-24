<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button primary big',
            'style' => 'color: red;',
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
            'title',
            'subtitle',
            'publisher',
            'year',
            'doi',
            'file',
        ],
    ]) ?>

</div>
