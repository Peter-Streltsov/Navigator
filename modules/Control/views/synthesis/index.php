<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h3>Отчеты</h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>

    <div>

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

    <div class="well">
        <div class="form-group">
            <label for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $model,
        'tableOptions' => [
            'id' => 'syntable',
            'class' => 'table table-hover',
        ],
        'columns' => [

            'name',
            'lastname',
            'habilitation',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        $buttonurl = Yii::$app->getUrlManager()->createUrl(['/control/synthesis/persona','id'=>$model['id']]);;
                        return Html::a('<span class="glyphicon glyphicon-file"></span>',
                            $buttonurl, [
                                'class' => 'button primary big',
                                'title' => Yii::t('yii',
                                'view')]);
                    }
                ],
                'template' => '{view}'
            ],
        ],
    ]);

    ?>
    <?php Pjax::end(); ?>

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
