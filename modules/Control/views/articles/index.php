<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опубликованные статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h3>Опубликованные статьи</h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>

        <div>

        <?= Html::a('Назад', yii\helpers\Url::previous(), ['class' => 'button big primary']) ?>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'button big primary']) ?>

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
            'title',
            'subtitle',
            'publisher',
            'year',
            'doi',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <br>
    <br>
    <br>


</div>
