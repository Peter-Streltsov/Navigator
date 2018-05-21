<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uploads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Загрузить данные', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
                'encodeLabel' => false,
],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'author_id',
            'description:ntext',
            //'uploadedfile',
            /*[
                'attribute' => 'uploadedfile',
                'encodeLabel' => true,
                'value' => function($model) {
                    //return 'link';
                    return Html::a('Прикрепленный файл', 'upload/' . $model->uploadedfile, ['class' => 'button primary big']);
                }
                ],*/
            'accepted',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                        'view' => function($url, $model) {
                            ob_start();
                            \yii\bootstrap\Modal::begin(
                                    [
                                            'toggleButton' => [
                                                    'label' => 'file'
                                            ]
                                    ]
                            );
                            echo Html::a('Прикрепленный файл', '/upload/' . $model->uploadedfile, ['class' => 'button primary big']);
                            \yii\bootstrap\Modal::end();
                            $modal = ob_get_contents();
                            ob_get_clean();
                            return $modal;
                        }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
