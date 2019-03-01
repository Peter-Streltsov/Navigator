<?php

use yii\bootstrap\Nav;

echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right',
    ],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<span style="color: ' . Yii::$app->counter->notificationColor() . ';" class="glyphicon glyphicon-send"></span>',
            'items' => [
                [
                    'label' => '<br>'
                ],
                [
                    'label' => '<t id="suspended">Уведомления</t>',
                    'url' => '#',
                    'options' => [
                        'style' => 'width: 10pc;'
                    ]
                ],
                [
                    'label' => '<br>'
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
                /*[
                    'label' => '<t id="suspend2">Загруженные данные</t> ' . Yii::$app->counter->messagesCount(),
                    'url' => '#'
                ],*/
                [
                    'label' => '<br>'
                ]
            ]
        ],
    ],
]);

?>
