<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $tokens \app\modules\Control\models\Accesstokens[]|array */

$this->title = 'Редактировать данные пользователя '.$model->username;
/*$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать данные '.$model->username;*/
?>
<div class="users-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <br>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
        'tokens' => $tokens
    ]) ?>

</div>
