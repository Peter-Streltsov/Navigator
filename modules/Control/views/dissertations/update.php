<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = 'Update Dissertations: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dissertations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dissertations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
