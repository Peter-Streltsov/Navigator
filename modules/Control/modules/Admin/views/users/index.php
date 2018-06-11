<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зарегистрированные пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <br>

    <h3>Зарегистрированные пользователи</h3>

    <br>
    <br>

    <?= Html::a('Создать пользователя', ['create'], ['class' => 'button big primary']) ?>

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
        'username',
        'name',
        'lastname',
        'created_at',
        'access_token'
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
            'username',
            'name',
            'lastname',
            'created_at:date',
            'access_token',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                        'view' => function($url, $model) {
                            $viewurl = Yii::$app->getUrlManager()->createUrl(['/control/admin/users/view','id'=>$model['id']]);
                            return Html::a('<span class="glyphicon glyphicon-info-sign"></span>',
                                $viewurl,
                                [
                                    'style' => 'border-radius: 2pc;',
                                    'class' => 'button primary big',
                                    'title' => Yii::t('yii', 'view')]);
                        }
                ]
                ],
            ]
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
