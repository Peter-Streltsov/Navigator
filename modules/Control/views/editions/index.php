<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Editions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editions-index">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <br>
    <br>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'chiefeditor',
            'editor',
            'volume',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
