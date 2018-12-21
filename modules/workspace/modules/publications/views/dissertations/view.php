<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-view">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Удалить диссертацию?',
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
            [
                'attribute' => 'author',
                'value' => function($model) {
                    $author = $model->authors;
                    return $author->name . ' ' . $author->lastname;
                }
            ],
            'year',
            'city',
            'organisation',
            'speciality',
            [
                'attribute' => 'habilitation',
                'value' => function($model) {
                    return $model->habilitationValue;
                    //$habilitation = $model->dissertationhabilitation;
                    //return $habilitation->habilitation;
                }
            ],
            [
                'attribute' => 'type',
                'value' => function($model) {
                            return $model->type;
                }
            ]
        ],
    ]) ?>

</div>
