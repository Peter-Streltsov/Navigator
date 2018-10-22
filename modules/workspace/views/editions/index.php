<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editions-index">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <br>
    <br>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'button primary big']) ?>
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

            'chiefeditor',
            'editor',
            'volume',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
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
