<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\IndexesArticles */

$this->title = 'Create Indexes Articles';
$this->params['breadcrumbs'][] = ['label' => 'Indexes Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indexes-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
