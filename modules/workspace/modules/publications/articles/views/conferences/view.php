<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\conferences\ArticleConference */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи - публикации материалов конференций', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-conferencies-view">

    <br>

    <h3 style="color: gray;"><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= Yii::$app->access->isAdmin() ? $this->render('forms/view/buttons', ['model' => $model]) : ''; ?>

    <br>
    <br>

    <div class="panel panel-default">
        <div class="panel panel-body">

            <br>

            <?= DetailView::widget([
                'model' => $model,
                'options' => [
                    'style' => 'color: gray;',
                    'class' => 'table table-hover',
                    'encodeLabels' => true
                ],
                'attributes' => [
                    'id',
                    'title:ntext',
                    'conference_collection:ntext',
                    'number',
                    //'language',
                    [
                        'attribute' => 'language',
                        'value' => function($model) {
                                    return $model->languageValue;
                        }
                    ],
                    'year',
                    [
                        'attribute' => 'Индекс ПНРД',
                        'value' => function($model) {
                                    //return $model->getIndex();
                        }
                    ],
                    [
                        'attribute' => 'annotation',
                        'value' => function($model) {
                                    if ($model->annotation != null) {
                                        return $model->annotation;
                                    }
                                    return 'Аннотация не загружена';
                        }
                    ],
                    'index:ntext',
                    'file',
                ],
            ]) ?>
        </div>
    </div>
</div>
