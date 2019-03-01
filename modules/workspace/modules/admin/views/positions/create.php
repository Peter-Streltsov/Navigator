<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Positions */

$this->title = 'Создать должность';
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-create">
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <h4 style="color: gray;"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="panel panel-body">
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => '/control/admin/positions/create'
            ]); ?>

            <br>
            <br>

            <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

            <br>

            <div class="form-group">
                <?= Html::submitButton('<t>Сохранить</t>', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
