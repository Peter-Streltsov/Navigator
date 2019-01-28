<?php

/* @var $citations \app\models\publications\monograph\Citations */
/* @var $citation_classes  */
/* @var $newcitation  */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|\app\modules\Control\models\Monographies|mixed|\yii\db\ActiveRecord */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Цитирования:</h4>
    </div>

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
    <div class="col-lg-1">

    </div>
    <div class="col-lg-5">
        <div class="panel panel-body">
            <?php $citations = ActiveForm::begin(); ?>
            <?= Html::hiddenInput('citation_flag', '1'); ?>
            <div class="row">
                <div class="col-lg-10">
                    <?= $citations->field($newcitation, 'title')->textInput(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <?= $citations->field($newcitation, 'class')->dropDownList($citation_classes); ?>
                </div>
                <div class="col-lg-5">
                    <?= $citations->field($newcitation, 'monography_id')->textInput(['value' => $model->id]); ?>
                </div>
            </div>
            <br>
            <?= Html::submitButton('Сохранить', ['class' => 'button primary big']); ?>
            <?php $citations::end(); ?>
        </div>
    </div>
</div>

