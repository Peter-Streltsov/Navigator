<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $model app\models\publications\articles\conferences\ArticleConference*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи - публикации материалов конференций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferences-index">

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

    $gridColumns = [
        'id',
        'title:ntext',
        'year',
        'conference_collection:ntext',
        'section',
        'number',
        'class',
        'number',
        [
            'attribute' => 'language',
            'value' => function ($model) {
                return $model->languageValue;
            }
        ],
        [
            'attribute' => 'Авторы',
            'encodeLabel' => false,
            'format' => 'raw',
            'value' => function($model) {
                $data = '';
                $authors = $model->getAuthors();
                foreach ($authors as $author) {
                    $data .= $author['name'] . ' ' . $author['lastname'] . '; ';
                }
                return $data;
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
    <br>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover',
            'id' => 'syntable'
        ],
        'columns' => [
            'id',
            'title',
            'year',
            [
                'attribute' => 'language',
                'value' => function ($model) {
                    return $model->languageValue;
                }
            ],
            [
                'attribute' => '',
                'format' => 'raw',
                'value' => function($model) {
                    $data = '';
                    $collection = '<b>Сборник</b> - ' . $model->conference_collection . '<br>';
                    $number = '<b>Номер - </b>' . $model->number . '<br>';
                    $section = '<b>Раздел сборника - </b>' . $model->section . '<br>';
                    $data .= $collection . $number . $section;
                    return $data;
                }
            ],
            [
                'attribute' => 'Авторы',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($model) {

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
                                .Html::a("<span style='font-size: 12px;' class='glyphicon glyphicon-education'> Данные автора</span>", ['/workspace/authors/view', 'id' => $author['id']])
                                .Html::a("<span style='font-size: 12px;' class='glyphicon glyphicon-align-justify'> Все публикации автора</span>", ['/workspace/authors/publications', 'id' => $author['id']])
                                ."</li>";
                            //$tag[] = "<li>".Html::a()."</li>";
                            $user[] = $top.$label.implode($tag).$bottom;
                        }

                        return implode("<br>", $user);
                    };

                    isset($model['authors'][0]) ? $authors = $links($model['authors']) : $authors = null;
                    $authors = $model->getAuthors();
                    isset ($authors[0]) ? $authors = $links($authors) : $authors = null;
                    return $authors;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        $buttonurl = Yii::$app->getUrlManager()->createUrl(['/workspace/articles/conferences/view','id'=>$model['id']]);;
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
                    },
                    'annotation' => function ($url, $model) {
                        ob_start();

                        if (isset($model->annotation)) {
                            Modal::begin([
                                'header' => "<h2>$model->title</h2><br>",
                                'size' => 'large',
                                'toggleButton' => [
                                    'label' => "<span class='glyphicon glyphicon-file'></span>",
                                    'style' => 'border-radius: 2pc;',
                                    'class' => 'button primary big'
                                ],
                            ]);

                            echo "<div class=\"panel panel-default\">" . $model->annotation . "</div>";

                            Modal::end();
                        }
                        $modal = ob_get_clean();
                        return $modal;
                    }
                ],
                'template' => "{view}<br><br>{annotation}<br><br>{file}"
            ],
        ],
    ]); ?>

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
