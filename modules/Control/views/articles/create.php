<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $classes  */
/* @var $types array */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="articles-create">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= $this->render('forms/create', [
        'model' => $model,
        'types' => $types,
        'classes' => $classes
    ]) ?>

</div>
