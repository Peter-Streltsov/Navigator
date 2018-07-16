<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Conferencies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferencies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Conferencies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'conferency_collection:ntext',
            'number',
            'language',
            //'annotation:ntext',
            //'text_index:ntext',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
