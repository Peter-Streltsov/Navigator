<?php

/* @var $this yii\web\View */
/* @var $model app\models\identity\Users */
/* @var $tokens \app\models\identity\Roles[]|array */

$this->title = 'Создать пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <?= $this->render('forms/create', [
        'model' => $model,
        'tokens' => $tokens
    ]) ?>

</div>
