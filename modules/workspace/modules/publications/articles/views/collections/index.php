<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи - публикации в сборниках';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-collection-index">

    <br>
    <br>

    <h3 style="color: gray;"><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?php Pjax::begin(); ?>

    <br>

    <div class="well">
        <div class="form-group">
            <label style="color: gray;" for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>

    <br>
    <br>

    <?php

    $gridcolumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title:ntext',
        'type',
        'collection:ntext',
        'section:ntext',
        'section_number',
        'language',
        //'text_index:ntext',
        //'annotation:ntext',
        //'link',
        //'file',
    ];

    echo \kartik\export\ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridcolumns
    ]);

    ?>

    <br>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover',
            'id' => 'syntable'
        ],
        'columns' => [
            'id',
            'title:ntext',
            'type',
            [
                'attribute' => 'language',
                'value' => function ($model) {
                    return $model->languageValue;
                }
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function ($model) {
                    $data = '';
                    $type = '<b>Вид - </b>' . $model->type . '<br>';
                    $collection = '<b>Сборник</b> - ' . $model->collection . '<br>';
                    $section = '<b>Раздел - </b>' . $model->section . '<br>';
                    $section_number = '<b>Номер раздела - </b>' . $model->section_number . '<br>';
                    $data .= $type . $collection . $section . $section_number;
                    return $data;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        $buttonurl = Yii::$app->getUrlManager()->createUrl(['/workspace/articles/collections/view','id'=>$model['id']]);;
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $buttonurl, ['class' => 'button primary big', 'style' => 'border-radius: 2pc;', 'title' => Yii::t('yii', 'Подробно')]);
                    },
                    'file' => function($url, $model) {
                        ob_start();

                        if (isset($model->file)) {
                            Modal::begin([
                                'header' => "<h2>$model->title</h2><br>",
                                'size' => 'large',
                                'toggleButton' => [
                                    'label' => "<span class='glyphicon glyphicon-file'></span>",
                                    'style' => 'border-radius: 2pc;',
                                    'class' => 'button primary big'
                                ],
                                'footer' => 'Close'
                            ]);
                            echo \yii2assets\pdfjs\PdfJs::widget([
                                'url' => Url::base().'/upload/articles/' . $model->file
                            ]);

                            Modal::end();
                        }
                        $modal = ob_get_clean();
                        return $modal;
                    }
                ],
                'template' => "{view}<br><br>{file}"
            ],
        ],
    ]);

    ?>

    <br>
    <br>
    <br>

    <script>
        $(document).ready(function(){
            $("#searchinput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#syntable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


    <?php Pjax::end(); ?>
</div>
