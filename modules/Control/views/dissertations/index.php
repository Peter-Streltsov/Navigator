<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Диссертации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить диссертацию', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'title',
            'author',
            //'author_id',
            'date',
            //'code',
            'organisation',
            'speciality',
            //'type',
            'opponents:ntext',
            //'annotation:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'view' => function($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-file"></span>', ['/control/dissertations/view', 'id' => $model->id], ['class' => 'button primary big']);
                        }
                ],
                'template' => '{view}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
