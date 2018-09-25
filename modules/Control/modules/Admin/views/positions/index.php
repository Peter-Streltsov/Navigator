<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Перечень должностей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-index">

    <br>
    <br>
    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать должность', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'position',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
