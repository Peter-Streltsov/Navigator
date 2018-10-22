<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = 'Редактировать данные' . ' - ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>
    <br>
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <br>
    <br>

    <?php
    echo $this->render('forms/update/dissertationform', [
            'cities' => $cities,
            'types' => $types,
            'model' => $model
    ])
    ?>

    <br>
    <br>
    <br>


<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
</div>

<br>
<br>
<br>

<?php ActiveForm::end(); ?>
