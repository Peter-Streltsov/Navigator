<?php

use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

?>

<div style="background-color: white;" class="container">
    <br>
    <div id="upper_menu" style="background-color: #f0f0f0;" class="row">
        <!--<div class="col-lg-12">
                    <?= $this->render('user/lower_menu'); ?>
                </div>-->
    </div>
    <div style="background-color: #f0f0f0;" class="row">
        <div id="side_menu" class="col-lg-3">
            <?= $this->render('user/side_menu'); ?>
        </div>
        <br>
        <div style="min-height: 50pc;" id="content-holder" class="col-lg-9">
            <br>

            <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Панель управления', 'url' => '/workspace'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?= Alert::widget() ?>

            <?= $content ?>
        </div>
    </div>
</div>
