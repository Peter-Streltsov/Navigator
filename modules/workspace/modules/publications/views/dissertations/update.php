<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\publications\dissertations\Dissertations */

$this->title = 'Редактировать данные' . ' - ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>

<div class="row">
    <div class="col-lg-10">
        <br>
        <br>
        <h3><?= Html::encode($this->title) ?></h3>
        <br>
        <br>
        <br>
    </div>
</div>

<?php Pjax::begin(); ?>

<div>
    <?php
    echo $this->render('forms/update/dissertation_form', [
        'cities' => $cities,
        'types' => $types,
        'model' => $model
    ]);
    ?>
</div>

<?php Pjax::end(); ?>

<br>
<br>
<br>
