<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $uploadsProvider \yii\data\ActiveDataProvider */
/* @var $messagesProvider \yii\data\ActiveDataProvider */

$this->title = 'Сообщения пользователей';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4><?= Html::encode($this->title); ?></h4>
    </div>
    <div class="panel panel-body">
        <?php

        echo GridView::widget([
            'dataProvider' => $messagesProvider,
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

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function($url, $model) {
                            ob_start();
                            \yii\bootstrap\Modal::begin([
                                'toggleButton' => [
                                    'label' => '<span class="glyphicon glyphicon-eye-open"></span>',
                                    'class' => 'button primary big',
                                    'style' => 'font-size: 16px; border-radius: 2pc;'
                                ],
                                'header' => "Сообщение №" . $model->id,
                                'options' => [
                                    'style' => 'margin-top: 10pc;'
                                ]
                            ]);

                            echo "<br>";

                            echo "<b>" . $model->text . "</b>";

                            echo "<br><br>";

                            echo Html::a(
                                '<span class="glyphicon glyphicon-check"></span>',
                                [
                                    '/control/admin/messages',
                                    'set' => 1,
                                    'id' => $model->id
                                ],
                                [
                                    'class' => 'button',
                                    'style' => 'border-radius: 2pc;'
                                ]);

                            \yii\bootstrap\Modal::end();
                            $content = ob_get_contents();
                            ob_get_clean();
                            return $content;
                        },
                        'read' => function($url, $model) {
                            if ($model->read != '1') {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-check"></span>',
                                    [
                                        '/control/admin/messages',
                                        'set' => 1,
                                        'id' => $model->id
                                    ],
                                    [
                                        'class' => 'button',
                                        'style' => 'border-radius: 2pc;'
                                    ]);
                            } else {
                                return '';
                            }
                        }
                    ],
                    'template' => '{view}'
                ],
            ],
        ]);

        ?>
    </div>
</div>
