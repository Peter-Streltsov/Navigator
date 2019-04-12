<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $citations app\models\publications\articles\journals\Citations */
/* @var $citation_classes  */
/* @var $newcitation app\models\publications\articles\journals\Citations */
/* @var $model \app\modules\Control\models\Articles|mixed|yii\db\ActiveRecord */
?>

<br>
<br>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4 style="color: gray;">Цитирования:</h4>
    </div>
    <div class="panel panel-body">
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel panel-body">
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
                $citations = ActiveForm::begin([
                    'action' => 'citation?id=' . $id,
                    'method' => 'post',
                    'options' => [
                        'data-pjax' => true,
                        'enctype' => 'multipart/form-data'
                    ],
                ]);
                echo $citations->field($newcitation, 'title')->textarea();
                echo $citations->field($newcitation, 'class')->dropDownList($citation_classes);
                echo $citations->field($newcitation, 'article_id')->hiddenInput(['value' => $model->id, 'readonly' => true])->label('');
                echo Html::submitButton('<span style="color: green;" class="glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-default']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>