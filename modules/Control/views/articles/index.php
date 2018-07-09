<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <br>

    <h2><?= Html::encode($this->title) ?></h2>

    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'button big primary']) ?>
    </p>

    <br>

    <div class="well">
        <div class="form-group">
            <label for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>


    <?php
    $gridColumns = [

        'id',
        'title',
        //'subtitle',
        //'publisher',
        'year',
        [
            'attribute' => 'authors',
            'encodeLabel' => false,
            'format' => 'raw',
            'value' => function($data) {

                $links = function($auth) {

                    $fio = [];

                    foreach ($auth as $author) {
                        $fio[$author['id']] = $author['lastname'].' '.mb_substr($author['name'],0,1,"UTF-8")."."
                            .mb_substr($author['secondname'],0,1,"UTF-8").".";
                    }

                    return implode(' ', $fio);
                };

                isset($data['authors'][0]) ? $authors = $links($data['authors']) : $authors = null;

                return $authors;
            }
        ],

    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns
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
            'title',
            'year',
            //'doi',
            [
                    'attribute' => 'authors',
                    'encodeLabel' => false,
                    'format' => 'raw',
                    'value' => function($data) {

                                // generates 'view' buttons for article authors
                                $links = function($auth) {

                                    $top = "<label class=\"dropdown\">";
                                    $ul = "<ul class=\"dropdown-menu\">";
                                    $bottom = "</ul></label>";

                                    foreach ($auth as $author) {
                                        $fio[$author['id']] = "<span style=\"font-size: 14px;\">"
                                            .$author['lastname']
                                            .' '
                                            .mb_substr($author['name'],0,1,"UTF-8")
                                            ."."
                                            .mb_substr($author['secondname'],0,1,"UTF-8")
                                            ."."
                                            .'</span>';
                                        $label = "<button type=\"button\" id=\"dropdownMenuButton\" style='width: 12pc;' data-toggle=\"dropdown\" class=\"btn btn-default\">".$fio[$author['id']]." <span class='caret'></span>"."</button>".$ul;
                                        $tag['br'] = "<br>";
                                        $tag['articles'] = "<li>"
                                            .Html::a("<span style='font-size: 12px;' class='glyphicon glyphicon-education'> Данные автора</span>", ['authors/view', 'id' => $author['id']])
                                            .Html::a("<span style='font-size: 12px;' class='glyphicon glyphicon-align-justify'> Все публикации автора</span>", ['articles/view', 'id' => $author['id']])
                                            ."</li>";
                                        //$tag[] = "<li>".Html::a()."</li>";
                                        $user[] = $top.$label.implode($tag).$bottom;
                                    }

                                    return implode("<br>", $user);
                                };

                                isset($data['authors'][0]) ? $authors = $links($data['authors']) : $authors = null;

                                return $authors;
                        }
                ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'view' => function($url, $model) {
                                    $buttonurl = Yii::$app->getUrlManager()->createUrl(['/control/articles/view','id'=>$model['id']]);;
                                    return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $buttonurl, ['class' => 'button primary big', 'style' => 'border-radius: 2pc;', 'title' => Yii::t('yii', 'Подробно')]);
                                    },
                        'file' => function($url, $model) {
                            ob_start();

                            if (isset($model->file)) {
                                \yii\bootstrap\Modal::begin([
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
                                    'url' => \yii\helpers\Url::base().'/upload/articles/' . $model->file
                                ]);

                                \yii\bootstrap\Modal::end();
                            }
                            $modal = ob_get_clean();
                            return $modal;
                        }
                    ],
                'template' => "{view}<br><br>{file}"
            ],
        ],
    ]);

    //\yii\helpers\VarDumper::dump($dataProvider);

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


</div>

<?php Pjax::end(); ?>
