<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Перечень должностей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-index">

    <?php Pjax::begin([
            'enablePushState' => false,
    ]); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h4 style="color: gray;"><?= Html::encode($this->title) ?></h4>
                </div>
                <div class="panel panel-body">

                    <p>
                        <?= Html::a('Создать должность', ['create'], ['class' => 'button primary big']) ?>
                    </p>

                    <br>
                    <br>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => [
                            'class' => 'table table-hover'
                        ],
                        'layout' => '{items}',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'position',
                                'label' => ''
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'update' => function($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/control/admin/positions/update?id=' . $model->id);
                                    },
                                    'delete' => function($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/control/admin/positions/delete?id=' . $model->id, ['data' => ['method' => 'post']]);
                                    }
                                ],
                                'template' => '{update} {delete}'
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>
