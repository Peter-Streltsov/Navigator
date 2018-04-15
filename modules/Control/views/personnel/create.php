<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Personnel */

$this->title = 'Добавить сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <?= $this->render('forms/_form', [
        'model' => $model,
    ]) ?>

</div>
