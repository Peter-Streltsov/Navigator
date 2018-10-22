<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Positions */

$this->title = 'Изменить название должности';
/*$this->params['breadcrumbs'][] = ['label' => 'Список должностей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->position, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';*/
?>

<?php Pjax::begin(['enablePushState' => false]); ?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="panel panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <br>
        <br>

        <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

        <br>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php Pjax::end(); ?>
