<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\units\articles\ArticleConferencies */

$this->title = 'Create Article Conferencies';
$this->params['breadcrumbs'][] = ['label' => 'Article Conferencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferencies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
