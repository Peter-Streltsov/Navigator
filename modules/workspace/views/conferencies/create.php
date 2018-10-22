<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Conferencies */

$this->title = 'Участие в конференции - добавить';
$this->params['breadcrumbs'][] = ['label' => 'Конференции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencies-create">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= $this->render('forms/create', [
        'model' => $model,
    ]) ?>

</div>
