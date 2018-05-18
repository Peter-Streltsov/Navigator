<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use \kartik\sidenav\SideNav;
use \app\modules\Control\models\Messages;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '<b class="navbrand">'.Yii::$app->data->data->organisation.' - Наукометрия'.'</b>',
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
                ['label' => 'Публичные данные',
                    'url' => '/public'
                ],
                ['label' => 'Обратная связь', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
                ) : (
                [
                    'label' => "<span class=\"glyphicon glyphicon-align-justify\"></span>",
                    'items' => [
                        ['label' => 'Панель управления', 'url' => ['/control'], 'options' => [
                            'style' => 'width: 20pc;'
                        ]],
                        ['label' => 'Личный кабинет', 'url' => ['/control/personal/', 'id' => Yii::$app->user->id]],
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
                        /*Html::a('Exit', ['/site/logout'])]*/
                    ]
                ]
                ),
            ],
        ]);
        NavBar::end();
        ?>



        <br>
        <br>
        <br>

        <div style="background-color: white;" class="container">
            <div class="row">
                <div style="background-color: #f0f0f0;" class="col-xs-12 col-md-3">

                    <br>
                    <br>

                    <?php

                    $items = [
                        [
                            'label' => 'Общие сведения',
                            'icon' => 'home',
                            'url' => '/control'
                        ],
                        [
                            'label' => 'Статистика',
                            'icon' => 'stats',
                            'url' => '/control/statistics'
                        ],
                        [
                            'label' => 'Авторы и сотрудники',
                            'icon' => 'user',
                            'items' => [
                                [
                                    'label' => 'Зарегистрированные пользователи',
                                    'url' => '/control/users'
                                ],
                                [
                                    'label' => 'Сотрудники',
                                    'url' => '/control/personnel'
                                ],
                                [
                                    'label' => 'Авторы',
                                    'url' => '/control/authors'
                                ]
                            ]
                        ],
                        [
                            'label' => 'Публикации',
                            'icon' => 'book',
                            'items' => [
                                [
                                    'label' => 'Статьи',
                                    'url' => '/control/articles'
                                ],
                                [
                                    'label' => 'Монографии',
                                    'url' => '/control/monographies'
                                ],
                                [
                                    'label' => 'Диссертации',
                                    'url' => '/control/dissertations'
                                ],
                                [
                                    'label' => 'Редактирование',
                                    'url' => '/control/editions'
                                ],
                            ]
                        ],
                        [
                            'label' => 'Научные мероприятия',
                            'icon' => 'list',
                            'items' => [
                                [
                                    'label' => 'Доклады'
                                ],
                                [
                                    'label' => 'Участие в конференциях',
                                    'url' => '/control/conferencies'
                                ]
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
                            'label' => 'Сообщения ' .
                                '<span style="background-color: red;" class="badge badge-light">' .
                                Messages::find()->where(['read' => null])->count() .
                                '</span>',
                            'icon' => 'comment',
                            'url' => '/control/messages'
                        ],
                        [
                            'label' =>'Отчеты',
                            'icon' => 'list-alt',
                            'url' => '/control/admin/synthesis'
                        ],
                        [
                            'label' => 'Параметры',
                            'icon' => 'certificate',
                            'items' => [
                                [
                                    'label' => 'Данные организации',
                                    'url' => '/control/orgdata'
                                ],
                                [
                                    'label' => 'Перечень должностей',
                                    'url' => '/control/positions'
                                ],
                                [
                                    'label' => 'Индексы',
                                    'items' => [
                                        [
                                            'label' => 'Индексы ПНРД - статьи',
                                            'url' => '/control/indexes?class=articles'
                                        ],
                                    ]
                                ],
                            ]
                        ],
                        [
                            'label' => 'WebAPI',
                            'icon' => 'cloud',
                            'items' => [
                                [
                                    'label' => 'Scopus',
                                    'url' => '/control/webapi/scopusapi'
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
                        ],
                        'items' => $items
                    ]);

                    ?>

                    <br>
                    <div id="main-menu" class="list-group">
                    </div>

                </div>
                <div class="col-xs-12 col-md-9">
                    <br>

                    <?= Breadcrumbs::widget([
                            'homeLink' => ['label' => 'Панель управления', 'url' => '/control'],
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>

                    <?= Alert::widget() ?>

                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>

    <footer style="color: #2a323b; height: 2.5pc; background-color: #d2d4d9;" class="navbar-fixed-bottom ">
        <div class="container">
            <p style="margin-top: 0.5pc;">
                <b class="pull-left">&copy;  <?= date('Y') ?> <?= Html::a(Yii::$app->data->data->organisation, 'http://'.Yii::$app->data->data->weblink) ?></b>

                <!--<b class="pull-right"><?= Yii::powered() ?></b>-->
            </p>
            <br>
        </div>
    </footer>

    <?php yii\helpers\Url::remember(); ?>

    <script>
        $(document).ready(function() {
            $("body").niceScroll().resize(25);
        });
    </script>

    <?php $this->endBody() ?>

    </body>

    </html>

<?php $this->endPage() ?>