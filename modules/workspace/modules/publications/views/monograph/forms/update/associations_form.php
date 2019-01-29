<?php

/* @var $affilation mixed */
/* @var $this \yii\web\View */

use app\models\publications\monograph\Associations;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Ассоциированные организации</h4>
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

                <?php

                /*$mod_affilation = new \app\models\publications\monograph\Associations();
                $affilation_form = ActiveForm::begin();
                echo Html::hiddenInput('affilation_flag', '1');

                if ($affilation != null) {
                    if ($affilation->type == 'self') {
                        echo $affilation_form
                            ->field($mod_affilation, 'name')
                            ->textInput(['style' => 'background-color: #ceebce;', 'value' => $affilation->name]);
                        echo Html::submitButton('Изменить', ['class' => 'button primary big']);
                    } else {
                        echo $affilation_form
                            ->field($mod_affilation, 'name')
                            ->textInput(['style' => 'background-color: #ffffe0;', 'value' => $affilation->name]);
                        echo Html::submitButton('Изменить', ['class' => 'button primary big']);
                    }
                    ActiveForm::end();
                } else {
                    echo "<b style='color: red;'>Affilation is not set</b>".PHP_EOL;
                    echo $affilation_form->field($mod_affilation, 'name')->textInput();
                    echo Html::submitButton('Сохранить', ['class' => 'button primary big']);
                    ActiveForm::end();
                }*/

                ?>
            </div>
            <div class="col-lg-1"></div>
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

                echo $authorsform->field($newAssociation, 'article_id')->hiddenInput(['value' => $id])->label('');
                echo $authorsform->field($newAssociation, 'name')->textInput();
                echo Html::submitButton('<span style="color: green;" class="glyphicon glyphicon-plus"></span>');

                ActiveForm::end();

                ?>
            </div>
        </div>
    </div>
</div>