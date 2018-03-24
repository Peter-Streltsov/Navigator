<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
            'brandLabel' => '<b class="navbrand">'.'Наукометрия'.'</b>',
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
                ['label' => 'Develop' ,
                    'visible' => !Yii::$app->user->isGuest,
                    'items' => [
                        ['label' => 'control', 'url' => ['/control']],
                        ['label' => 'Users', 'url' => ['/control/users']],
                        ['label' => 'Test', 'url' => ['/test']],
                        ['label' => 'Articles', 'url' => ['/control/articles']]
                    ]
                ],
                ['label' => 'Обратная связь', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/site/login']]
                ) : (
                        [
                            'label' => "<span class=\"glyphicon glyphicon-list\"></span>",
                            'items' => [
                                ['label' => 'Панель управления', 'url' => ['/control'], 'options' => [
                                        'style' => 'width: 20pc;'
                                ]],
                                ['label' => 'Личный кабинет', 'url' => ['/control/user/', 'id' => Yii::$app->user->id]],
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
            <br>
            <?php

            //\yii\helpers\VarDumper::dump($this->params);

            ?>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?= Alert::widget() ?>

            <?= $content ?>

        </div>
    </div>

    <footer style="color: #2a323b; height: 2.5pc; background-color: #7b8c85;" class="navbar-fixed-bottom ">
        <div class="container">
            <p style="margin-top: 0.5pc;">
            <b class="pull-left">&copy;  <?= date('Y') ?></b>

            <b class="pull-right"><?= Yii::powered() ?></b>
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