<?php

// yii classes
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\publications\monograph\Monograph */
/* @var $authors \app\models\identity\Authors[]|array|string */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="monographs-view">

    <br>
    <h3><?= Html::encode($this->title) ?></h3>
    <br>
    <br>
    <p>
        <?= Html::a('Редактировать <span class=\'glyphicon glyphicon-edit\'></span>', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить <span class=\'glyphicon glyphicon-remove-circle\'></span>', ['delete', 'id' => $model->id], [
            'class' => 'button primary danger big',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'class' => 'table'
                ],
                'attributes' => [
                    'id',
                    'title',
                    'city',
                    'pages_number',
                    'language',
                    'volume_name',
                    'volume_number',
                    'year',
                    'isbn',
                    'file',
                ],
            ]) ?>
        </div>
    </div>
</div>
