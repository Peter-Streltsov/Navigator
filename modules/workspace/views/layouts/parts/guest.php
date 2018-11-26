<?php

use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

?>

<div style="background-color: white;" class="container">
    <br>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= Alert::widget() ?>

    <?= $content ?>

</div>
