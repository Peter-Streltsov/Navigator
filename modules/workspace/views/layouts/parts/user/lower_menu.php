<?php

use yii\bootstrap\Nav;

echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav'
    ],
    'encodeLabels' => false,
    'activateParents' => true,
    'activateItems' => true,
    'items' => [
        [
            'label' => '<span class="glyphicon glyphicon-home"> Общие сведения</span>',
            'url' => '/workspace'
        ],
        [
            'label' => '<span class="glyphicon glyphicon-user"> Авторы и сотрудники</span>',
            'items' => [
                [
                    'label' => '<br>'
                ],
                [
                    'label' => 'Сотрудники',
                    'url' => '/workspace/personnel'
                ],
                [
                    'label' => '<br>'
                ],
                [
                    'label' => 'Авторы',
                    'url' => '/workspace/authors'
                ],
                [
                    'label' => '<br>'
                ],
            ]
        ],
        [
            'label' => '<span class="glyphicon glyphicon-book"> Публикации</span>',
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
            'label' => '<span class="glyphicon glyphicon-cloud"> WebAPI</span>',
            'icon' => 'cloud',
            'items' => [
                [
                    'label' => '<br>'
                ],
                [
                    'label' => 'Scopus',
                    'url' => '/workspace/webapi/scopusapi'
                ],
                [
                    'label' => '<br>'
                ],
                [
                    'label' => 'CrossRef',
                    'url' => '/workspace/webapi/crossref'
                ],
                [
                    'label' => '<br>'
                ],
            ]
        ],
    ],

]);

?>

