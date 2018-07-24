<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\units\articles\ArticleConferencies */

$this->title = 'Доавить статью - публикации материалов конференций';
$this->params['breadcrumbs'][] = ['label' => 'Article Conferencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferencies-create">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('forms/create', [
        'model' => $model,
    ]) ?>

</div>
