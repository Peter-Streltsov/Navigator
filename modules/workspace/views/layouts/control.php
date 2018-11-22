<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

        echo $this->render('parts/navbar');

        ?>

        <br>
        <br>
        <br>

        <div style="background-color: white;" class="container">
            <br>
            <div id="upper_menu" style="background-color: #f0f0f0;" class="row">
                <!--<div class="col-lg-12">
                    <?= $this->render('parts/lower_menu'); ?>
                </div>-->
            </div>
            <div style="background-color: #f0f0f0;" class="row">
                <div id="side_menu" class="col-lg-3">
                    <?= $this->render('parts/side_menu'); ?>
                </div>
                <br>
                <div style="min-height: 50pc;" id="content-holder" class="col-lg-9">
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