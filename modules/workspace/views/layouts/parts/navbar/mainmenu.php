<?php

use yii\bootstrap\Nav;

echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right',
        ],
    'encodeLabels' => false,
    'items' => [
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
                    ['label' => 'Личный кабинет', 'url' => ['/workspace/personal/']],
                    //'<br>',
                    '<li class="divider"></li>',
                    ['label' => 'Вы вошли как:<br><br>'],
                    ['label' => '<img style="border-radius: 0.5pc; max-width: 2pc;" src="/files/userimages/' . (Yii::$app->user->getIdentity())->image . '">'],
                    ['label' => "<b style=\"color: #32a873\">".' '.Yii::$app->user->identity->name.' '.Yii::$app->user->identity->lastname.'</b>'],
                    ['label' => '<b>'.Yii::$app->user->identity->username.'</b>'],
                    '<br>',
                    '<li class="divider"></li>',
                    ['label' => 'Выход', 'url' => ['/site/logout'], 'linkOptions' => [
                        'data-method' => 'post'
                    ]],
                    [
                        'label' => ''
                    ]
                ]
            ]
        ),
        ],
    ]);
