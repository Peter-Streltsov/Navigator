<?php

/* @var $uploadsProvider \yii\data\ActiveDataProvider */
/* @var $this \yii\web\View */
/* @var $accepted \yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;

$this->title = 'Загруженные данные';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="">

    <br>

    <h3> <?= Html::encode($this->title); ?></h3>

    <br>
    <br>

    <?php

    Modal::begin([
            'toggleButton' => [
                    'label' => 'Принятые загрузки',
                    'class' => 'button primary big'
            ]
    ]);

    echo GridView::widget([
        'dataProvider' => $accepted,
        'tableOptions' => [
                'class' => 'table'
        ],
        'columns' => [
            'id',
            'title',
            'subtitle'
        ]
    ]);

    Modal::end();

    ?>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">

            <?php
            echo GridView::widget([
                'dataProvider' => $uploadsProvider,
                'tableOptions' => [
                    'class' => 'table'
                ],
                'columns' => [
                    'id',
                    'title',
                    'subtitle',
                    'description',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'accept' => function($url, $model) {
                                    ob_start();

                                    // represents uploaded data model and actions
                                    Modal::begin([
                                        'toggleButton' => [
                                            'label' => '<span class="glyphicon glyphicon-info-sign"></span>',
                                            'class' => 'button primary',
                                            'style' => 'border-radius: 2vh;'
                                            ],
                                        'options' => [
                                                'style' => 'padding-top: 7vh;'
                                        ]
                                    ]);

                                    echo "<h3>";
                                    echo Html::encode($model->title);
                                    echo "</h3>";
                                    echo "<br>";

                                    // uploaded data model
                                    echo \yii\widgets\DetailView::widget([
                                            'model' => $model,
                                        'attributes' => [
                                                'title',
                                                'subtitle',
                                                'publisher',
                                                'uploadedfile',
                                                'description'
                                        ]
                                    ]);

                                    echo "<br><br>";

                                    echo Html::a('Принять', [
                                        'acceptupload',
                                        'id' => $model->id],
                                        [
                                            'class' => 'button primary'
                                        ]);

                                    echo Html::a('Отклонить', [
                                        'declineupload',
                                        'id' => $model->id],
                                        [
                                            'class' => 'button primary danger'
                                        ]);

                                    Modal::end();

                                    $content = ob_get_contents();
                                    ob_get_clean();

                                    return $content;
                                } // end function
                        ],
                        'template' => '{accept}'
                    ]
                ]
            ]);

            ?>

        </div>
    </div>
</div>
