<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\identity\Personnel */

$this->title = $model->name . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-10">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <br>
    <br>

    <?php
    if (Yii::$app->access->isAdmin()) {
        echo $this->render('forms/buttons_form', [
                'model' => $model
        ]);
    }
    ?>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table'
                        ],
                        'attributes' => [
                            'id',
                            'name',
                            'secondname',
                            'lastname',
                            'position',
                            [
                                'attribute' => 'habilitation',
                                'value' => function ($model) {
                                    return $model->habilitationValue;
                                }
                            ],
                            'employment',
                            'expirience',
                            'age',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?= str_repeat('<br>', 11) ?>
