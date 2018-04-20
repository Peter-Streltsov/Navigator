<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Monographies */

$this->title = 'Редактировать данные';
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>
<div class="monographies-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('forms/update', [
        'model' => $model,
        'model_authors' => $model_authors,
        'author_items' => $author_items,
        'authors' => $authors,

    ]) ?>

</div>
