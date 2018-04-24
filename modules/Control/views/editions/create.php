<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Editions */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Редактирование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<br>

<div class="editions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
