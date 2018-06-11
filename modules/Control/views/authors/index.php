<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <br>

    <h3>Список авторов</h3>

    <br>
    <br>

    <?= Html::a('Добавить автора', ['create'], ['class' => 'button primary big']) ?>

    <br>
    <br>

    <div class="well">
        <div class="form-group">
            <label for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>

    <br>
    <br>

    <?php

    $gridColumns = [
        'id',
        'name',
        'secondname',
        'lastname',
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
            'class' => 'table table-hover'
        ],
        'id' => 'syntable',
        'columns' => [

            'id',
            'name',
            'secondname',
            'lastname',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        $buttonurl = Yii::$app->getUrlManager()->createUrl(['/control/authors/view','id'=>$model['id']]);;
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $buttonurl, ['style' => 'border-radius: 2pc;', 'class' => 'button primary big', 'title' => Yii::t('yii', 'view')]);
                    }
                ],
                'template' => '{view}'
            ],
        ],
    ]); ?>

</div>

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
