<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Monographies */
/* @var $author_items array */
/* @var $file \app\modules\Control\models\Fileupload */
/* @var $model_authors \app\modules\Control\models\Monographies */
/* @var $authors \app\modules\Control\models\Authors[]|array */
/* @var $classes \app\modules\Control\models\Articles[]|array */
/* @var $citations \yii\data\ActiveDataProvider */
/* @var $citation_classes array */
/* @var $newcitation \app\modules\Control\models\MonographiesCitations */

$this->title = 'Редактировать данные - ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Монографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="monographies-update">

    <div class="row">

        <div class="col-lg-10">
            <br>
            <h3><?= Html::encode($this->title) ?></h3>
            <br>
            <br>
        </div>

    </div>

    <div class="monographies-form">
        <?= $this->render('forms/update/monographyform', [
                'model' => $model,
                'classes' => $classes
        ]) ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/modalsform', [
            'file' => $file,
            'author_items' => $author_items,
            'model_authors' => $model_authors,
            'model' => $model
        ]); ?>
    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/citationsform', [
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
