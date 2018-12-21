<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\publications\monograph\Monograph */

$this->title = 'Добавить монографию';
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monographies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
