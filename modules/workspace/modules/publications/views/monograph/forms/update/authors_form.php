<?php

/* @var $author_items array */
/* @var $authors array */
/* */
/* @var $this yii\web\View */
/* @var $model app\models\publications\monograph\Monograph */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Авторы:</h4>
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-6">
                <br>
                <br>
                <br>
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <?php
                        echo GridView::widget([
                            'dataProvider' => $authors,
                            'layout' => "{items}",
                            'tableOptions' => [
                                'class' => 'table table-hover'
                            ],
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                ],
                                [
                                    'attribute' => 'lastname',
                                    'label' => '',
                                    'value' => function($model) {
                                        $author = $model->author();
                                        return $author->name . ' ' . $author->secondname . ' ' . $author->lastname;
                                    }
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'buttons' => [
                                        'delete' => function($url, $model) {
                                            return Html::a('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', 'deleteauthor?author_id='. $model->id . '&id='. $model->article_id);
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
                <br>
                <br>
                <?php
                $form = ActiveForm::begin([
                    'action' => ['author?id=' . $id],
                    'method' => 'post',
                    'options' => [
                        'data-pjax' => true,
                        'enctype' => 'multipart/form-data'
                    ],
                ]);
                echo $form->field($author, 'author_key')->widget(Select2::className(), [
                    'data' => $author_items,
                    'pluginOptions' => [],
                    'options' => [
                        'tags' => true
                    ]
                ]);
                echo $form->field($author, 'article_id')->hiddenInput(['value' => $id])->label('');
                //echo $form->field($newAuthor, 'part')->textInput();
                echo Html::submitButton('<span style="color: green;" class="glyphicon glyphicon-plus"></span>');
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
