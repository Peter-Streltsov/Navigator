<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $classes array */
/* @var $habilitations array */
/* @var $model app\models\identity\Personnel */

$this->title = 'Редактировать данные - ' . $model->name.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
        'label' => $model->name . ' ' . $model->lastname, 'url' => ['view', 'id' => $model->id]
];
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>
<div class="personnel-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('forms/update', [
        'model' => $model,
        'classes' => $classes,
        'habilitations' => $habilitations
    ]) ?>

</div>
