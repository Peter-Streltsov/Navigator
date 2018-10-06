<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\ArticleCollection */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи - публикации в сборниках и главы книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Добавить';
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

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>