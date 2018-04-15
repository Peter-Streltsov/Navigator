<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные монографии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monographies-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить монографию', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [

            'id',
            'title',
            'subtitle',
            'year',
            'doi',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
