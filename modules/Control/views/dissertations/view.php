<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Dissertations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            'author_id',
            'date',
            'code',
            'organisation',
            'speciality',
            'type',
            'opponents:ntext',
            'annotation:ntext',
        ],
    ]) ?>

</div>
