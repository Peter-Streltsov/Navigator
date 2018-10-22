<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\units\articles\journals\ArticleJournal */
/* @var $classes  */
/* @var $types array */
/* @var $languages \app\models\common\Languages */
/* @var $magazines array */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="articles-create">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <?= $this->render('forms/create', [
        'model' => $model,
        'types' => $types,
        'languages' => $languages,
        'magazines' => $magazines,
        'classes' => $classes
    ]) ?>

</div>
