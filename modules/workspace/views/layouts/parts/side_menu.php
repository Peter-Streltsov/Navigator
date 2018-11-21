<?php

// number of unread uploads
//$uploads_count = '<span style="background-color: darkslategray;" class="badge badge-light">' .
//Upload::find()->where(['accepted' => '0'])->count() .
//'</span>';

$items = [
    [
        'label' => 'Общие сведения',
        'icon' => 'home',
        'url' => '/workspace'
    ],
    [
        'label' => '<b id="statistics">Статистика</b>',
        'icon' => 'stats',
        //'url' => '/control/statistics'
        'url' => '#'
    ],
    [
        'label' => 'Авторы и сотрудники',
        'icon' => 'user',
        'items' => [
            [
                'label' => 'Сотрудники',
                'url' => '/workspace/personnel'
            ],
            [
                'label' => 'Авторы',
                'url' => '/workspace/authors'
            ]
        ]
    ],
    [
        'label' => 'Публикации',
        'icon' => 'book',
        'items' => [
            [
                'label' => 'Статьи',
                'items' => [
                    [
                        'label' => 'Статьи в журналах',
                        'url' => '/workspace/articles/journals'
                    ],
                    [
                        'label' => 'Статьи в сборниках и главы в книгах',
                        'url' => '/workspace/articles/collections'
                    ],
                    [
                        'label' => 'Статьи в сборниках трудов конференций',
                        'url' => '/workspace/articles/conferences'
                    ]
                ]
            ],
            [
                'label' => 'Монографии и Сборники',
                'url' => '/workspace/monograph'
            ],
            [
                'label' => 'Конференции',
                'url' => '/workspace/conference'
            ],
            [
                'label' => 'Диссертации',
                'url' => '/workspace/dissertations'
            ],
            [
                'label' => 'Редактирование',
                'url' => '/workspace/editions'
            ],
        ]
    ],
    [
        'label' => 'Научно-популяризаторская работа',
        'icon' => 'blackboard',
        'items' => [
            [
                'label' => 'Лекции'
            ]]
    ],
    [
        'label' =>'<b id="synthesis">Отчеты</b>',
        'icon' => 'list-alt',
        //'url' => '/control/admin/synthesis'
        'url' => '#'
    ],
    [
        'label' => 'Параметры',
        'icon' => 'certificate',
        'url' => '/workspace/admin/',
    ],
    [
        'label' => 'WebAPI',
        'icon' => 'cloud',
        'items' => [
            [
                'label' => 'Scopus',
                'url' => '/workspace/webapi/scopusapi'
            ],
            [
                'label' => 'CrossRef',
                'url' => '/workspace/webapi/crossref'
            ]
        ]
    ],
];

echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'encodeLabels' => false,
    'heading' => 'Панель управления',
    'activateParents' => false,
    'activateItems' => true,
    'hideEmptyItems' => false,
    'containerOptions' => [
        'style' => [
            'width' => '17pc'
        ],
        'data-spy' => 'affix'
    ],
    'items' => $items
]);

?>

                    <br>
                    <div id="main-menu" class="list-group">
                    </div>

                </div>-->