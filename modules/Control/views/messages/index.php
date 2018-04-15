<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <?php Pjax::begin(); ?>

    <br>
    <br>


    <?php $messages = GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
                'class' => 'table'
        ],
        'options' => [
                'class' => 'table'
        ],
        'columns' => [

            //'id',
            'user_id',
            'username',
            'created_at',
            'category',
            'custom_theme',
            //'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    echo \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => 'Сообщения',
                'content' => "<br><br>".$messages
            ],
            [
                'label' => 'Запросы'
            ]
        ]
    ]) ?>

    <?php Pjax::end(); ?>
</div>
