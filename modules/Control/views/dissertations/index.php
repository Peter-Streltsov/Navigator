<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Диссертации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-index">

    <br>

    <h2><?= Html::encode($this->title) ?></h2>

    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить диссертацию', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <div class="well">
        <div class="form-group">
            <label for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table table-hover',
            'id' => 'syntable'
        ],
        'columns' => [

            'title',
            'author',
            //'author_id',
            'date',
            //'code',
            'organisation',
            'speciality',
            //'type',
            'opponents:ntext',
            //'annotation:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'view' => function($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-file"></span>', ['/control/dissertations/view', 'id' => $model->id], ['class' => 'button primary big']);
                        }
                ],
                'template' => '{view}',
            ],
        ],
    ]); ?>
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
