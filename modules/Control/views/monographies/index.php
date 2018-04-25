<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные монографии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monographies-index">

    <br>

    <h2><?= Html::encode($this->title) ?></h2>

    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <div>
        <?= Html::a('Добавить монографию', ['create'], ['class' => 'button primary big']) ?>
    </div>
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
        'title',
        'subtitle',
        'year',
        'isbn',
        [
            'attribute' => 'authors',
            'encodeLabel' => false,
            'format' => 'raw',
            'value' => function($data) {
                $links = function($auth) {

                    $fio = [];

                    foreach ($auth as $author) {
                        $fio[$author['id']] = $author['lastname'].' '.mb_substr($author['name'],0,1,"UTF-8")
                            .".".mb_substr($author['secondname'],0,1,"UTF-8");
                    }

                    return implode(" ", $fio);

                };

                isset($data['authors'][0]) ? $authors = $links($data['authors']) : $authors = null;

                return $authors;

            }
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
                'view' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-file"></span>', ['/control/monographies/view', 'id' => $model->id], ['class' => 'button primary big']);
                }
            ]
        ],
        ];

    ?>

    <?php
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
    ]);
    ?>

    <br>
    <br>

    <?php
    // You can choose to render your own GridView separately
    echo GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => [
        'class' => 'table table-hover',
        'id' => 'syntable'
    ],
        'columns' => [
            'title',
            'subtitle',
            'year',
            'isbn',
            [
                'attribute' => 'authors',
                'encodeLabel' => false,
                'format' => 'raw',
                'value' => function($data) {
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
                                //.$author['name'].' '.$author['secondname']
                                //.' '
                                //.$author['lastname']
                                .'</span>';
                            $label = "<button type=\"button\" id=\"dropdownMenuButton\" style='width: 12pc;' data-toggle=\"dropdown\" class=\"btn btn-default\">".$fio[$author['id']]." <span class='caret'></span>"."</button>".$ul;
                            $tag['br'] = "<br>";
                            $tag['articles'] = "<li>"
                                .Html::a("<span style='font-size: 12px;'>Данные автора</span>", ['authors/view', 'id' => $author['id']])
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
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-file"></span>', ['/control/monographies/view', 'id' => $model->id], ['class' => 'button primary big']);
                    }
                ]
            ],
        ]
    ]);

    ?>

    <?php Pjax::end(); ?>

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
