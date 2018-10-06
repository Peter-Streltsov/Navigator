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

    <h2><?= Html::encode($this->title) ?></h2>

    <br>
    <br>
    <br>

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'button primary big']) ?>
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

    <?php

    $gridcolumns = [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title:ntext',
        'type',
        'collection:ntext',
        'section:ntext',
        //'section_number',
        //'language',
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
            'collection:ntext',
            'section:ntext',
            'section_number',
            'language',
            //'text_index:ntext',
            //'annotation:ntext',
            //'link',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
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
