<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

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


    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->
    <?php Pjax::begin([
            'enablePushState' => false
    ]); ?>
    <div>
        <?php
        echo $this->render('forms/update/buttons', [
            'file' => $file,
            'model' => $model
        ])
         ?>
    </div>
    <?php Pjax::end(); ?>
    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->


    <br>
    <br>


    <!----------------------------------------------------------------------------------------------------------------->
    <!-- Rendering main monograph data form --------------------------------------------------------------------------->
    <?php Pjax::begin([
            'enablePushState' => false
    ]); ?>
    <div class="monographies-form">
        <?= $this->render('forms/update/monograph_form', [
                'model' => $model,
                'classes' => $classes
        ]) ?>
    </div>
    <?php Pjax::end(); ?>
    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->


    <br>
    <br>


    <!----------------------------------------------------------------------------------------------------------------->
    <!-- Rendering associations form with Yii Pjax widget ------------------------------------------------------------->
    <?php Pjax::begin([
            'enablePushState' => false
    ]); ?>
    <div>
        <?= $this->render('forms/update/associations_form', [
            'associations' => $associations,
            'newAssociation' => $newAssociation,
            'id' => $id
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->


    <br>
    <br>

    <!----------------------------------------------------------------------------------------------------------------->
    <!-- ??? ---------------------------------------------------------------------------------------------------------->
    <?php Pjax::begin([
            'enablePushState' => false
    ]); ?>
    <div>
        <?= $this->render('forms/update/authors_form', [
            //'file' => $file,
            'author_items' => $author_items,
            'id' => $id,
            'newAuthor' => $newAuthor,
            'modelAuthors' => $modelAuthors,
            'model' => $model
        ]); ?>
    </div>
    <?php Pjax::end() ?>
    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->


    <br>
    <br>


    <!----------------------------------------------------------------------------------------------------------------->
    <!-- Rendering citations form ------------------------------------------------------------------------------------->
    <div>
        <?= $this->render('forms/update/citations_form', [
            'model' => $model,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation
        ]) ?>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------------------------------------------->

    <br>
    <br>

</div>
