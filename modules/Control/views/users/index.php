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

    <h3>Зарегистрированные пользователи</h3>

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
                            $viewurl = Yii::$app->getUrlManager()->createUrl(['/control/users/view','id'=>$model['id']]);
                            return Html::a('<span class="glyphicon glyphicon-file"></span>', $viewurl, ['class' => 'button primary big', 'title' => Yii::t('yii', 'view')]);
                        }
                ]
                ],
            ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
