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

    <br>
    <br>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
        'options' => [
                'class' => 'table'
        ],
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
