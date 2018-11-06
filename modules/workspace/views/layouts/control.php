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
//use \app\modules\Control\models\Messages;

AppAsset::register($this);
$this->registerJsFile('/js/layout.js');

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

    <body style="overflow: hidden;">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>




    <?php $this->beginBody() ?>

    <div class="wrap">
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
        ?>



        <br>
        <br>
        <br>

        <div style="background-color: white;" class="container">
            <div style="background-color: #f0f0f0;" class="row">
                <div id="control-panel" class="col-xs-12 col-md-3">

                    <br>
                    <br>

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
                            'label' => '<b id="suspended_link">Статистика</b>',
                            'icon' => 'stats',
                            //'url' => '/control/statistics'
                            'url' => '#'
                        ],
                        [
                            'label' => 'Авторы и сотрудники',
                            'icon' => 'user',
                            'items' => [
                                /*[
                                    'label' => 'Зарегистрированные пользователи',
                                    'url' => '/control/admin/users'
                                ],*/
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
                        /*[
                            'label' => 'Научные мероприятия',
                            'icon' => 'list',
                            'items' => [
                                [
                                    'label' => 'Доклады'
                                ],
                                [
                                    'label' => 'Участие в конференциях',
                                    'url' => '/control/conferences'
                                ]
                            ]
                        ],*/
                        [
                            'label' => 'Научно-популяризаторская работа',
                            'icon' => 'blackboard',
                            'items' => [
                                [
                                    'label' => 'Лекции'
                                ]]
                        ],
                        [
                            'label' => 'Сообщения '
                                . Yii::$app->counter->messagesCount()
                                . ' ',
                                //. $uploads_count,
                            'icon' => 'comment',
                            'items' => [
                                [
                                    'label' => 'Пользовательские сообщения' . Yii::$app->counter->messagesCount(),
                                    'url' => '/workspace/admin/messages/users'
                                ],
                                [
                                    'label' => 'Загруженные данные',// . $uploads_count,
                                    'url' => '/workspace/admin/messages/uploads'
                                ]
                            ]
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

                </div>
                <div style="min-height: 50pc;" id="content-holder" class="col-xs-12 col-md-9">
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
    </div>


    <div id="about" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <!--<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>-->
                <br>
                <br>
                <br>
                <div class="modal-body">
                    <p>Version: 0.4.8</p>
                </div>
                <br>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <footer style="color: #2a323b; height: 2.5pc; background-color: #d2d4d9;" class="navbar-fixed-bottom ">
        <div class="container">
            <p style="margin-top: 0.5pc;">
                <b class="pull-left">&copy;  <?= date('Y') ?> <?= Html::a(Yii::$app->data->label, 'http://'.Yii::$app->data->orgdata->weblink) ?></b>

                <!--<b class="pull-right"><?= Yii::powered() ?></b>-->
            </p>
            <br>
        </div>
    </footer>

    <?php yii\helpers\Url::remember(); ?>

    <!--<script>
        $(document).ready(function() {
            $("body").niceScroll().resize(25);
        });
    </script>-->

    <?php $this->endBody() ?>

    </body>

    </html>

<?php $this->endPage() ?>