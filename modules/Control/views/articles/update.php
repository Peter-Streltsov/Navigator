<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */

$this->title = 'Редактировать данные статьи - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="articles-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>

    <?= $this->render('forms/update', [
        'model' => $model,
        'classes' => $classes,
        'authors' => $authors,
        'model_authors' => $model_authors,
        'author_items' => $author_items
    ]) ?>

</div>
