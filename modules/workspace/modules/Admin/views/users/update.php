<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $tokens \app\modules\Control\models\Accesstokens[]|array */

$this->title = 'Редактировать данные пользователя '.$model->username;
/*$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные '.$model->username;*/
?>
<div class="users-update">

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="panel panel-body">
            <?php $form = ActiveForm::begin([
                'validateOnType' => true,
                'action' => '/workspace/admin/users/update?id=' . $model->id,
                'method' => 'post'
            ]); ?>

            <?= $form->field($model, 'username')->input('email') ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

            <?php $tokens = \yii\helpers\ArrayHelper::map($tokens, 'token', 'token'); ?>

            <?= $form->field($model, 'access_token')->dropDownList($tokens) ?>

            <br>
            <br>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
