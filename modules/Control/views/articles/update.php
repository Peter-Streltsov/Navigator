<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $author_items array */
/* @var $file \app\modules\Control\models\Fileupload */
/* @var $classes \app\modules\Control\models\Articles[]|\app\modules\Control\models\IndexesArticles[]|array */
/* @var $model_authors \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles */
/* @var $authors \app\modules\Control\models\Authors[]|array */
/* @var $citations \app\modules\Control\models\ArticlesCitations[]|array */
/* @var $newcitation \app\modules\Control\models\ArticlesCitations */

$this->title = 'Редактировать данные статьи - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
$this->registerJsFile('/js/years.selector.js');
?>
<div class="articles-update">

    <!--<?php /*echo $this->render('forms/update', [
        'model' => $model,
        'classes' => $classes,
        'file' => $file,
        'authors' => $authors,
        'model_authors' => $model_authors,
        'author_items' => $author_items
    ])*/ ?>-->

    <div class="articles-form">
        <?= $this->render('forms/update/articleform', [
            'title' => $this->title,
            'classes' => $classes,
            'model' => $model
        ]) ?>
    </div>

    <div class="article-form">

    </div>

    <br>
    <br>

    <div>
        <?= $this->render('forms/update/modalsform', [
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
