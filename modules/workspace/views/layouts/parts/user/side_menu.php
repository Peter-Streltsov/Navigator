<?php

use kartik\sidenav\SideNav;

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
        'label' => 'Авторы',
        'icon' => 'user',
        'url' => '/workspace/authors'
    ],
    [
        'label' => 'Сотрудники',
        'icon' => 'user',
        'url' => '/workspace/personnel'
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
    /*[
        'label' =>'<b id="synthesis">Отчеты</b>',
        'icon' => 'list-alt',
        //'url' => '/control/admin/synthesis'
        'url' => '#'
    ],*/
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

?>


<br>
<div id="main-menu" class="list-group">

    <?php

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
</div>
