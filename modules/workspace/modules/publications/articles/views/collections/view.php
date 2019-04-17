<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\collections\ArticleCollection */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-collection-view">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить статью', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Удалить статью? (действие отменить невозможно)',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'style' => 'color: gray;',
                            'class' => 'table table-default'
                        ],
                        'attributes' => [
                            'id',
                            'title:ntext',
                            [
                                'attribute' => 'type',
                                'value' => function ($model) {
                                    return $model->getType();
                                }
                            ],
                            'collection:ntext',
                            'section:ntext',
                            'section_number',
                            'language',
                            [
                                'attribute' => 'annotation',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $annotation = $model->annotation;
                                    ob_start();
                                    Modal::begin([
                                        'toggleButton' => [
                                            'label' => 'Аннотация'
                                        ]
                                    ]);
                                    echo $model->annotation;
                                    Modal::end();
                                    $modal = ob_get_contents();
                                    ob_get_clean();
                                    return $annotation == null ? null : $modal;
                                }
                            ],
                            [
                                'attribute' => 'index',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $index = $model->index;
                                    ob_start();
                                    Modal::begin([
                                        'toggleButton' => [
                                            'label' => 'Текст'
                                        ]
                                    ]);
                                    echo $model->index;
                                    Modal::end();
                                    $modal = ob_get_contents();
                                    ob_get_clean();
                                    return $index == null ? null : $modal;
                                }
                            ],
                            'created_at:time',
                            'updated_at',
                            'link',
                            'file',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
