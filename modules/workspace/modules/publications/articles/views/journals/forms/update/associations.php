<?php

// project classes
use app\models\units\articles\journals\Associations;
// yii classes
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Ассоциированные организации:</h4>
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
                            'dataProvider' => $associations,
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
                                    'attribute' => 'name',
                                    'label' => ''
                                ],
                                [
                                    'class' => ActionColumn::className(),
                                    'buttons' => [
                                        'delete' => function($url, $model) {
                                            return Html::a('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', 'deleteassociation?id=' . $model->id);
                                        }
                                    ],
                                    'template' => '{delete}'
                                ]
                            ]
                        ]);

                        ?>
                    </div>
                </div>

                <br>
            </div>

            <div class="col-lg-1">

            </div>

            <div class="col-lg-5">
                <?php

                $authorsform = ActiveForm::begin([
                    'options' => [
                        'data-pjax' => true,
                        'enctype' => 'multipart/form-data'
                    ],
                    'action' => ['association?id=' . $id],
                    'method' => 'post'
                ]);

                $assoc = new Associations();

                echo $authorsform->field($assoc, 'article_id')->hiddenInput(['value' => $id])->label('');
                echo $authorsform->field($assoc, 'name')->textInput();
                echo Html::submitButton('<span style="color: green;" class="glyphicon glyphicon-plus"></span>');

                ActiveForm::end();

                ?>
            </div>
        </div>
    </div>

</div>
