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

            'username',
            'created_at:datetime',
            'category',
            'custom_theme',
            //'text:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'view' => function($url, $model) {
                            /*return Html::a(
                                    '<span class="glyphicon glyphicon-file"></span>',
                                    [
                                        '/control/messages/view',
                                        'id' => $model->id
                                    ],
                                    [
                                        'class' => 'button primary big'
                                    ]);*/
                        },
                    'read' => function($url, $model) {
                            if ($model->read != '1') {
                                return Html::a(
                                        '<span class="glyphicon glyphicon-check"></span>',
                                        [
                                            '/control/messages',
                                            'set' => 1,
                                            'id' => $model->id
                                        ],
                                        [
                                            'class' => 'button primary big'
                                        ]);
                            } else {
                                return '';
                            }
                    }
                        ],
                'template' => '{view} {read}'
            ],
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
