<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-index">

    <h3>Список авторов</h3>

    <br>

    <?php Pjax::begin(); ?>

    <p>

    <div>

        <?= Html::a('Добавить автора', ['create'], ['class' => 'button primary big']) ?>

        <label class="dropdown">

            <button type="button" id="dropdownMenuButton" data-toggle="dropdown" class="button big">
                <b>Экспорт </b>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#"><span style="color: red; font-size: 12px;" class="glyphicon glyphicon"> PDF</span></a></li>
                <li><a href="#"><span style="color: blue; font-size: 12px;" class="glyphicon glyphicon"> JPEG</span></a></li>
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
            'name',
            'secondname',
            'lastname',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        $buttonurl = Yii::$app->getUrlManager()->createUrl(['/control/authors/view','id'=>$model['id']]);;
                        return Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $buttonurl, ['style' => 'border-radius: 2pc;', 'class' => 'button primary big', 'title' => Yii::t('yii', 'view')]);
                    }
                ],
                'template' => '{view}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
