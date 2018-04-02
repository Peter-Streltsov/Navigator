<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */

$this->title = 'Редактировать авторов '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать авторов';
?>
<div class="articles-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php echo $this->render('forms/updateform', [
        'model' => $model,
        'authors' => $authors,
        'author_items' => $author_items
    ]) ?>

</div>