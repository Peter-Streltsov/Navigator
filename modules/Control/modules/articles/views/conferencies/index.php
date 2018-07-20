<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи - публикации материалов конференций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-conferencies-index">

    <br>
    <br>

    <h2><?= Html::encode($this->title) ?></h2>

    <br>
    <br>
    <br>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'button primary big']) ?>
    </p>

    <br>

    <div class="well">
        <div class="form-group">
            <label for="usr">Поиск:</label>
            <input type="text" class="form-control" id="searchinput">
        </div>
    </div>

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
            'conferency_collection:ntext',
            'number',
            'language',
            //'annotation:ntext',
            //'text_index:ntext',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
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
