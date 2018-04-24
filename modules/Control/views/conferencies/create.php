<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Conferencies */

$this->title = 'Create Conferencies';
$this->params['breadcrumbs'][] = ['label' => 'Conferencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
