<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-view">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Удалить диссертацию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php

    if (Yii::$app->access->isAdmin()) {
        echo $this->render('forms/view/control', [
                'model' => $model
        ]);
    }

    ?>

    <br>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table'
                        ],
                        'attributes' => [
                            'id',
                            'title',
                            [
                                'attribute' => 'author',
                                'value' => function($model) {
                                    $author = $model->authors;
                                    return $author->name . ' ' . $author->lastname;
                                }
                            ],
                            'year',
                            'cityName',
                            'language',
                            'organisation',
                            'state_registration',
                            'pages_number',
                            'speciality',
                            'habilitationValue',
                            'typeValue'
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
