<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php Pjax::begin([
    'enablePushState' => false,
]); ?>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Зарегистрированные пользователи</h4>
            </div>
            <div class="panel panel-body">
                <br>
                <?= Html::a('Создать пользователя', ['/control/admin/users/create'], ['class' => 'button big primary']) ?>
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
                        //'created_at:date',
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
        </div>
    </div>
</div>
    <br>
    <br>
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
