<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\IndexesArticles */

$this->title = 'Создать новый индекс';
$this->params['breadcrumbs'][] = ['label' => 'Индексы ПНРД - статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indexes-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('forms/_form', [
        'model' => $model,
    ]) ?>

</div>
