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
        [
            'label' => '<span style="color: red;" class="glyphicon glyphicon-send"></span>',
            'items' => [
                [
                    'label' => '<br>'
                ],
                [
                    'label' => '<b id="suspended">Уведомления</b>',
                    //'url' => '/control/personal/notifications',
                    'options' => [
                        'style' => 'width: 10pc;'
                    ]
                ],
                [
                    'label' => '<br>'
                ],
                [
                    'label' => 'Загрузить данные',
                    'url' => '/workspace/personal/upload'
                ],
                [
                    'label' => '<br>'
                ]
            ]
        ],
        [
            'label' => '<span style="color: ' . Yii::$app->counter->messageColor() . ';" class="glyphicon glyphicon-comment"></span>',
            'items' => [
                [
                    'label' => '<br>'
                ],
                [
                    'label' => '<f id="suspend1">Пользовательские сообщения</f> ' . Yii::$app->counter->messagesCount(),
                    //'url' => '/control/personal/notifications',
                    'url' => '#',
                    'options' => [
                        'style' => 'width: 20pc;'
                    ]
                ],
                [
                    'label' => '<br>'
                ],
                [
                    'label' => '<t id="suspend2">Загруженные данные</t> ' . Yii::$app->counter->messagesCount(),
                    'url' => '#'
                ],
                [
                    'label' => '<br>'
                ]
            ]
        ],
        Yii::$app->user->isGuest ? (
        ['label' => 'Войти', 'url' => ['/site/login']]
        ) : (
        [
            'label' => "<span class=\"glyphicon glyphicon-align-justify\"></span>",
            'items' => [
                [
                    'label' => '<br>'
                ],
                ['label' => 'Панель управления', 'url' => ['/workspace'], 'options' => [
                    'style' => 'width: 20pc;'
                ]],
                ['label' => 'Личный кабинет', 'url' => ['/workspace/personal/', 'id' => Yii::$app->user->id]],
                //'<br>',
                '<li class="divider"></li>',
                ['label' => 'Вы вошли как:'],
                ['label' => "<b style=\"color: #32a873\">".' '.Yii::$app->user->identity->name.' '.Yii::$app->user->identity->lastname.'</b>'],
                ['label' => '<b>'.Yii::$app->user->identity->username.'</b>'],
                '<br>',
                '<li class="divider"></li>',
                ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => [
                    'data-method' => 'post'
                ]]
            ]
        ]
        ),
    ],
]);
NavBar::end();
