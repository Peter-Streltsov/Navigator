<?php

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

    <title></title>

    <?php $this->head(); ?>

</head>

<body>

<?php $this->beginBody() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="wrap">

    <div class="col-lg-5 row">


    <div class="header clearfix">
        <nav class="navbar navbar-light">
             <!--style="background-color: #cdc7bb" >-->
            <div  style="position: fixed;" class="container-fluid">

            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-light',
                    'style' => 'background-color: #cdc7bb; box-shadow: 0 0 1pc;'
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Develop' ,
                        'items' => [
                                ['label' => 'Users', 'url' => ['/control/users']],
                                ['label' => 'Test', 'url' => ['/test']]
                        ]
                    ],
                    ['label' => 'Test', 'url' => ['/site/test']],
                    ['label' => 'Обратная связь', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Options',
                                'items' => [
                                        ['label' => /*Html::a('<span>Enter</span>', 'site/login')*/ 'Enter', 'url' => ['/site/login']]]
                            ]
                    ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::dropDownList()
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                    ),
                ],
            ]);
            NavBar::end();
            ?>
            </div>
        </nav>
    </div>
    </div>


    <?= $content ?>


</div>

<!--<script src="/public/js/jquery.nicescroll.min.js"></script>-->
<script>
    $(document).ready(function() {
        $("body").niceScroll().resize(25);
    });
</script>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage(); ?>
