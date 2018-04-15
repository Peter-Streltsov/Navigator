<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>


    <?php Pjax::begin(); ?>

    <p>

    <div>

        <?= Html::a('Назад', yii\helpers\Url::previous(), ['class' => 'button big primary']) ?>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'button big primary']) ?>

        <label class="dropdown">

            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="button big">
                <b>Экспорт </b> <span class="glyphicon glyphicon-hdd"></span>
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
                'class' => 'table table-hover'
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
                'template' => '{view} {update}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
