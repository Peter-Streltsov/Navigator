<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $author_items array */
/* @var $file \app\models\filesystem\Fileupload */
/* @var $model_authors \app\models\publications\monograph\Monograph */
/* @var $authors \app\models\identity\Authors[]|array */
/* @var $classes \app\models\pnrd\indexes\IndexesArticles[]|array */
/* @var $citations \yii\data\ActiveDataProvider */
/* @var $citation_classes array */
/* @var $newcitation \app\models\publications\monograph\Citations */
/* @var $association \app\models\publications\monograph\Associations|array|null */

$this->title = 'Редактировать данные - ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="monograph-update">

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

        <?php
        //echo $this->render('forms/update/buttons', [
            //'file' => $file,
            //'model' => $model
        //])
        // ?>

    </div>

    <br>
    <br>

    <div class="monographies-form">
        <?= $this->render('forms/update/monograph_form', [
                'model' => $model,
                'classes' => $classes
        ]) ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/associations_form', [
            'affilation' => $affilation
        ]); ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/modals_form', [
            //'file' => $file,
            'author_items' => $author_items,
            //'model_authors' => $model_authors,
            'model' => $model
        ]); ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/citations_form', [
            'model' => $model,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation
        ]) ?>
    </div>

    <br>
    <br>

    <?php /*echo $this->render('forms/update', [
        'model' => $model,
        'model_authors' => $model_authors,
        'file' => $file,
        'author_items' => $author_items,
        'authors' => $authors,

    ])*/ ?>

</div>
