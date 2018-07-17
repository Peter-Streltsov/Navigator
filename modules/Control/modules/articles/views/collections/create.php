<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\ArticleCollection */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Article Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить статью';
?>

<div class="article-collection-update">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= $this->render('forms/create', [
        'model' => $model,
        'languages' => $languages
    ]);
    ?>


</div>