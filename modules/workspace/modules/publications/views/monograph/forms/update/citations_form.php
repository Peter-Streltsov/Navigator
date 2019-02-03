<?php

/* @var $citations \app\models\publications\monograph\Citations */
/* @var $citation_classes  */
/* @var $newcitation  */
/* @var $this \yii\web\View */
/* @var $model \app\models\publications\monograph\Monograph */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;

?>


<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Цитирования:</h4>
    </div>
    <div class="panel panel-body">
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <br>
                        <br>
                        <?php
                        echo GridView::widget([
                        'dataProvider' => $citations,
                            'tableOptions' => [
                                'style' => 'border-radius: 3vh;',
                                'class' => 'table table-hover'
                            ],
                        'layout' => "{items}",
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                ],
                                [
                                    'attribute' => 'title',
                                    'label' => '',
                                ],
                                [
                                    'attribute' => 'class',
                                    'label' => ''
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'buttons' => [
                                        'delete' => function($url, $model) {
                                            return Html::a('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', 'deletecitation?id=' . $model->article_id . '&citation=' . $model->id);
                                        }
                                    ],
                                    'template' => '{delete}'
                                ]
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <?php
                $citations = ActiveForm::begin();
                echo $citations->field($newcitation, 'title')->textarea();
                echo $citations->field($newcitation, 'class')->dropDownList($citation_classes);
                echo $citations->field($newcitation, 'monography_id')->hiddenInput(['type' => 'hidden', 'value' => $model->id])->label('');
                ?>
                <?= Html::submitButton('<span style="color: green;" class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default']);; ?>
                <?php $citations::end(); ?>
            </div>
        </div>
    </div>

</div>

