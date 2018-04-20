<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные монографии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monographies-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить монографию', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns' => [

            'id',
            'title',
            'subtitle',
            'year',
            'doi',
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
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
