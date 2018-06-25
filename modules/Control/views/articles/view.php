<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $class \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles|array|null */
/* @var $authors \app\modules\Control\models\Authors[]|array|string */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <p>
        <?= Html::a("Редактировать <span class='glyphicon glyphicon-edit'></span>", ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a("Удалить <span class='glyphicon glyphicon-remove-circle'></span>", ['delete', 'id' => $model->id], [
            'class' => 'button primary danger big',
            'data' => [
                'confirm' => 'Подтверждение - удалить статью?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>
    <br>

    <div class="panel panel-default">
        <div class="panel panel-body">

            <br>

            <?= DetailView::widget([
                'model' => $model,
                'view' => [
                        ''
                ],
                'options' => [
                    'class' => 'table',
                    'encodeLabesl' => true
                ],
                'attributes' => [
                    'id',
                    'title',
                    'year',
                    'language',
                    'doi',
                [
                    'attribute' => 'type',
                    'label' => 'Тип публикации',
                    'value' => function($model) {
                            return $model->publicationtype->type;
                        }
                    ],
                [
                    'attribute' => 'class',
                    'label' => 'Индекс ПНРД',
                    'value' => function($model) {
                            return $model->publicationclass->description;
                    }
                ],
                [
                    'attribute' => 'file',
                    'label' => 'Прикрепленный файл и текст',
                    'format' => 'raw',
                    'value' => function($model) {
                            if ($model->file != '') {
                                ob_start();
                                if (isset($model->file)) {
                                    Modal::begin([
                                        'header' => "<h2>$model->title</h2><br><h4><h4>",
                                        'size' => 'modal-lg',
                                        'bodyOptions' => [
                                        'width' => '200pc;'
                                        ],
                                        'options' => [
                                                'width' => '200'
                                        ],
                                        'toggleButton' => [
                                            'label' => "<span class='glyphicon glyphicon-file'></span>",
                                            'style' => 'border-radius: 2pc;',
                                            'class' => 'button primary big'
                                        ],
                                        'footer' => 'Close'
                                    ]);
                                    echo \yii2assets\pdfjs\PdfJs::widget([
                                            'url' => \yii\helpers\Url::base().'/upload/articles/' . $model->file
                                    ]);
                                    Modal::end();
                                }
                                $modal = ob_get_clean();
                                return $modal;
                            }
                        }
                    ],
                    [
                        'attribute' => 'authors',
                        'value' => function($model) {
                            $authors = [];
                            if (isset($model['data'][0])) {
                                foreach ($model['data'] as $author) {
                                    $authors[] = $author['lastname']
                                        . ' ' . mb_substr($author['name'],0,1,"UTF-8")
                                        . '.' . mb_substr($author['secondname'],0,1,"UTF-8")
                                        .'.';
                                }
                            }
                            return implode("\n", $authors);
                        }
                    ]
                ],
            ]);
            ?>

            <br>
            <br>
            <br>
        </div>
    </div>
</div>
