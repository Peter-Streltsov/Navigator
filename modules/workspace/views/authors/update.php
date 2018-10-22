<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Authors */

$this->title = 'Редактировать данные - ' . ' ' . $model->name . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name . ' ' . $model->lastname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>
<div class="authors-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
