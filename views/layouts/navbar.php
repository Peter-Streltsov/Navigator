<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>

<?php


Yii::$app->data->orgdata->organisation != null ? $brandLabel = Yii::$app->data->label . ' - ' : $brandLabel = '';

NavBar::begin([
    'brandLabel' => '<b class="navbrand">'. $brandLabel . 'Наукометрия'.'</b>' . '<b style="font-size: 1vh; color: red;"> alpha</b>',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
        'style' => 'background-color: #2a323b; box-shadow: 0 0 1pc;'
    ],
]);
echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right',
    ],
    'encodeLabels' => false,
    'items' => [
        //['label' => "<input style='height: 1.5pc; color: #fff; background-color: #2c3337;' placeholder='Поиск' class=\"form-control\" type=\"text\"></input>"],
        [
            'label' => 'Публичные данные',
            'url' => '/public'
        ],
        [
            //'label' => '<button data-toggle="modal" data-target="#about"><span class="glyphicon glyphicon info-sign"></span></button>'
            'label' => '<span data-toggle="modal" data-target="#about" class="glyphicon glyphicon-info-sign"></span>'
        ],
        $this->render('navbar/mainmenu'),
        !Yii::$app->user->isGuest ? $this->render('navbar/messages') : ''
    ],
]);
NavBar::end();
