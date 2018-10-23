<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\units\articles\conferences\ArticleConference */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи - материалы конференций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferencies-create">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

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
