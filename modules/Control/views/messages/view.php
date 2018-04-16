<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Messages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <h4><?= $model->category ?></h4>

    <div class="panel panel-default">
        <div class="panel-heading">Panel Heading</div>
        <div class="panel-body">Panel Content</div>
    </div>

    <br>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            'username',
            'created_at',
            'category',
            //'custom_theme',
            //'text:ntext',
        ],
    ]) ?>

    <?php

    ?>

</div>
