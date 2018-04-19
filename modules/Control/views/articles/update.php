<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */

$this->title = 'Редактировать статью: '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="articles-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>

    <?= Html::a('Редактировать авторов', \yii\helpers\Url::to(['articles/authors', 'id' => $model->id])) ?>

    <?= $this->render('forms/_form', [
        'model' => $model,
        'classes' => $classes
    ]) ?>

</div>
