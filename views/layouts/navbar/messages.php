<?php

use yii\bootstrap\Nav;

echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right',
    ],
    'encodeLabels' => false,
    'items' => [
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
    ],
]);

?>
