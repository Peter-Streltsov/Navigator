<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h3>Опубликованные статьи</h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>

        <div>

        <?= Html::a('Назад', yii\helpers\Url::previous(), ['class' => 'button big primary']) ?>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'button big primary']) ?>

        <label class="dropdown">

            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="button big">
                <b>Экспорт</b> <span class="glyphicon glyphicon-hdd"></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#"><span style="color: red; font-size: 12px;" class="glyphicon glyphicon"> PDF</span></a></li>
                <li><a href="#"><span style="color: blue; font-size: 12px;" class="glyphicon glyphicon"> JPEG</span></a></li>
                <!--<li class="divider"></li>-->
                <li><a href="#"><span style="color: green; font-size: 12px;" class="glyphicon glyphicon"> XLS</span></a></li>
            </ul>
        </label>
    </div>

    </p>

    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
                'class' => 'table table-hover',
                ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'subtitle',
            'publisher',
            'year',
            //'doi',
            //'file',
            //'authors',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    //\yii\helpers\VarDumper::dump($dataProvider);

    ?>
    <?php Pjax::end(); ?>

    <br>
    <br>
    <br>


</div>
