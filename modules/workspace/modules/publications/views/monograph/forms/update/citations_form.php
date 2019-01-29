<?php

/* @var $citations \app\models\publications\monograph\Citations */
/* @var $citation_classes  */
/* @var $newcitation  */
/* @var $this \yii\web\View */
/* @var $model \app\models\publications\monograph\Monograph */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Цитирования:</h4>
    </div>

    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <?php
                        /**
                        echo \yii\grid\GridView::widget([
                        'dataProvider' => $citations,
                        'tableOptions' => [
                        'class' => 'table'
                        ],
                        'columns' => [
                        'title',
                        'class',
                        ]
                        ]);*/
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <?php
            $citations = ActiveForm::begin();
            echo $citations->field($newcitation, 'title')->textInput();
            echo $citations->field($newcitation, 'class')->dropDownList($citation_classes);
            echo $citations->field($newcitation, 'monography_id')->textInput(['type' => 'hidden', 'value' => $model->id]);
            ?>
            <?= Html::submitButton('Сохранить', ['class' => 'button primary big']); ?>
            <?php $citations::end(); ?>
        </div>
    </div>

</div>

