<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\publications\articles\journals\ArticleJournal */
/* @var $author_items array */
/* @var $file \app\models\filesystem\Fileupload */
/* @var $classes \app\models\pnrd\indexes\IndexesArticles[]|array */
/* @var $model_authors \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles */
/* @var $authors \app\models\identity\Authors[]|array */
/* @var $citations \app\modules\Control\models\ArticlesCitations[]|array */
/* @var $newcitation \app\modules\Control\models\ArticlesCitations */
/* @var $citation_classes array */
/* @var $affilation mixed */
/* @var $affilations mixed */
/* @var $newlanguage \app\models\common\Languages */
/* @var $languages array */
/* @var $magazines array */
/* @var $newauthor \app\models\identity\Authors */

$this->title = 'Редактировать данные - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи - публикации в журналах', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';

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

    <?php Pjax::begin(); ?>

    <div>
        <?= $this->render('forms/update/buttons', [
            'file' => $file,
            'model' => $model
        ]) ?>
    </div>

    <?php Pjax::end(); ?>

    <br>
    <br>

    <?php Pjax::begin([
            'enablePushState' => false,
    ]); ?>

    <div class="articles-form">
        <?= $this->render('forms/update/articleform', [
            'classes' => $classes,
            'languages' => $languages,
            'magazines' => $magazines,
            'model' => $model
        ]) ?>
    </div>

    <?php Pjax::end(); ?>

    <br>
    <br>

    <?php Pjax::begin([
            'enablePushState' => false,
            'id' => 'associations',
    ]); ?>

    <div id="associations">
        <?= $this->render('forms/update/associations', [
            'associations' => $associations,
            'id' => $id
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

    <br>
    <br>

    <?php Pjax::begin([
        'enablePushState' => false,
        'id' => 'authors'
    ]); ?>

    <div id="authors">
        <?= $this->render('forms/update/authorsform', [
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
            'id' => $id
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

    <br>
    <br>

    <?php Pjax::begin([
            'id' => 'citations',
            'enablePushState' => false,
    ]); ?>

    <div id="citations">
        <?= $this->render('forms/update/citationsform', [
            'model' => $model,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation,
            'id' => $id
        ]) ?>
    </div>

    <?php Pjax::end(); ?>

</div>
