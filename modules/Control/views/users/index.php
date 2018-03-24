<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зарегистрированные пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h3>Список зарегистрированных пользователей</h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>

    <div>

        <?= Html::a('Назад', yii\helpers\Url::previous(), ['class' => 'button big primary']) ?>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'button big primary']) ?>

        <label class="dropdown">

            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="button big">
                <b>Экспорт </b>
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
                'class' => 'table table-hover'
                ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'name',
            'lastname',
            'created_at:date',
            //'auth_key',
            //'token',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                /*'buttons' => [
                    'all' => function($url, $model, $key) {
                        return \yii\bootstrap\ButtonDropdown::widget([
                            'label' => 'Действия',
                            'encodeLabel' => false,
                            'options' => [
                                'style' => ['class' => 'btn btn-success']
                            ],
                            'dropdown' => [
                                'encodeLabels' => false,
                                'items' => [
                                    ['label' => "<span class=\"glyphicon glyphicon-eye-open\"> Просмотр</span>", 'url' => ['/control/users/view', 'id' => $model->id]],
                                    ['label' => "<span class=\"glyphicon glyphicon-pencil\"> Изменить</span>", 'url' => ['/control/users/update', 'id' => $model->id]],
                                ]
                            ]
                        ]);
                    }
                    /*'share' => function($url, $model, $key) {
                                return Html::a(\yii\bootstrap\Html::icon('share') , ['access/create', 'id' => $model->id]);
                    }*/
                //]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
