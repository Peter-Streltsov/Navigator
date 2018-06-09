<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $author_items array */
/* @var $file \app\modules\Control\models\Fileupload */
/* @var $classes \app\modules\Control\models\Articles[]|\app\modules\Control\models\IndexesArticles[]|array */
/* @var $model_authors \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles */
/* @var $authors \app\modules\Control\models\Authors[]|array */
/* @var $citations \app\modules\Control\models\ArticlesCitations[]|array */
/* @var $newcitation \app\modules\Control\models\ArticlesCitations */
/* @var $citation_classes array */
/* @var $affilation mixed */

$this->title = 'Редактировать данные - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
$this->registerJsFile('/js/years.selector.js');
?>
<div class="articles-update">

    <div class="row">

        <div class="col-lg-10">
            <br>
            <br>
            <h3><?= Html::encode($this->title) ?></h3>
            <br>
            <br>
            <br>
            <br>
        </div>

    </div>

    <div>

        <?= $this->render('forms/update/buttons', [
            'file' => $file,
            'model' => $model
        ]) ?>

    </div>

    <br>
    <br>

    <div class="articles-form">
        <?= $this->render('forms/update/articleform', [
            'classes' => $classes,
            'model' => $model
        ]) ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/affilation', [
                'affilation' => $affilation
                ]); ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/authorsform', [
            'author_items' => $author_items,
            'file' => $file,
            'model_authors' => $model_authors,
            'model' => $model
        ]); ?>
    </div>

    <br>

    <div>
        <?= $this->render('forms/update/citationsform', [
                'model' => $model,
                'citations' => $citations,
                'citation_classes' => $citation_classes,
                'newcitation' => $newcitation
        ]) ?>
    </div>

</div>
