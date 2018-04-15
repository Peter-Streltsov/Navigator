<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Данные организации';
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<?= \yii\widgets\DetailView::widget([
        'model' => $model
]); ?>
