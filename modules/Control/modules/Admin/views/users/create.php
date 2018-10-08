<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $tokens \app\modules\Control\models\Accesstokens[]|array */

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
