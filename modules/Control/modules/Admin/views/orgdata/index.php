<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = 'Данные организации';
$this->params['breadcrumbs'][] = $this->title;

?>

<br>
<br>

<h3>Данные организации</h3>

<br>
<br>

<?= Html::a('Редактировать', 'orgdata/update', ['class' => 'button primary big']); ?>

<br>
<br>
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-3">
        Название
    </div>
    <div class="col-lg-8">
        <div class="form-control">
            <?= $model->organisation; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">

    </div>
</div>
