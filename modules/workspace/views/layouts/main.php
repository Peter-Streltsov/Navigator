<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
//
$this->registerJsFile('/js/layout.js');

// application name
$this->title = 'Наукометрия';

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

        <!-- rendering main menu -->
        <?php

        echo $this->render('parts/navbar');

        ?>

        <br>
        <br>
        <br>

        <!-- rendering content (user access dependent) -->
        <div id="content">
            <?php

            echo Yii::$app->user->isGuest ? $this->render('parts/guest', ['content' => $content])
                :  $this->render('parts/user', ['content' => $content]);

            ?>
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
                    <p>Version: 0.4.10</p>
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

    <?php $this->endBody() ?>

    </body>

    </html>

<?php $this->endPage() ?>