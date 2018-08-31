<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Authors */

$this->title = 'Добавить автора';
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить автора';
?>
<div class="authors-create">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
