<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="articles-create">

    <br>
    <?= Html::a('<span class="glyphicon glyphicon-chevron-left"></span>', yii\helpers\Url::previous(), ['class' => 'button pill']); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= $this->render('forms/_form', [
        'model' => $model,
    ]) ?>

</div>
