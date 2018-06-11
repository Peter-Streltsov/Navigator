<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-index">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'button big primary']) ?>

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
        'position',
        'employment:datetime',
        'expirience',
        'age:datetime'
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
            'class' => 'table table-hover',
            'id' => 'syntable'
        ],
        'columns' => [

            'id',
            'name',
            'secondname',
            'lastname',
            'position',
            'employment:datetime',
            'expirience',
            'age:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                        'view' => function($url, $model) {
                            $button = Html::a(
                                    '<span class="glyphicon glyphicon-info-sign"></span>',
                                    ['/control/personnel/view', 'id' => $model->id],
                                    [
                                        'style' => 'border-radius: 2pc;',
                                        'class' => 'button primary big'
                                    ]
                            );
                            return $button;
                        },
                ],
                'template' => '{view}'
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
