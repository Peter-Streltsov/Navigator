<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\units\articles\collections\ArticleCollection */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-collection-view">

    <br>

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <p>
        <?= Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']) ?>
        <?= Html::a('Удалить статью', ['delete', 'id' => $model->id], [
            'class' => 'button danger big',
            'data' => [
                'confirm' => 'Удалить статью? (действие отменить невозможно)',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>
    <br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            'type',
            'collection:ntext',
            'section:ntext',
            'section_number',
            'language',
            'text_index:ntext',
            'annotation:ntext',
            'link',
            'file',
        ],
    ]) ?>

</div>
