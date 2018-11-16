<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $indexes  */
/* @var $model \app\modules\Control\models\Users|array|null */
/* @var $personal \app\modules\Control\models\Personnel|array|null */
/* @var $meanindex float */
/* @var $articles array */
/* @var $currentarticles array */
/* @var $dataprovider \yii\data\ArrayDataProvider */

$this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/modules/personal/module.js');

?>

<br>
<br>

<!--<div class="well">
    <h4><?= Html::encode($this->title); ?></h4>
</div>-->

<br>

<!-- upper buttons -->
<div class="row">
    <div class="col-lg-8">
        <div id="upper_buttons">
            <?php
            echo $this->render('forms/controlrow', [
                'model' => $model,
                'notifications' => $notifications,
                'message' => $message,
                'author' => $author
            ]);
            ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div id="photo-holder">
            <?php
            if ($model->userpic == null) {
                echo $this->render('forms/noimage');
            } else {
                echo $this->render('forms/imageholder');
            }
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php
        echo $this->render('forms/info', [
                'author' => $author
        ]);
        ?>
    </div>
</div>
<!-- end block -->

<br>

<!-- personal data -->
<div class="row">
    <div class="col-lg-7">

        <?php

        echo $this->render('forms/personaldata', [
                'personaldata' => $personaldata
        ]);

        ?>
    </div>
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel panel-body">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- end block -->

<!-- basic user information -->
<?php
 /*echo $this->render('forms/commondata', [
    'personal' => $personal
]);*/
 ?>
<!-- end block -->

<br>

<!---->
<?php
 /*echo $this->render('forms/panels', [
    'indexes' => $indexes,
    'currentarticles' => $currentarticles,
    'meanindex' => $meanindex
]);*/
 ?>
<!-- end block -->

<br>
<br>

<div class="row">
    <div class="col-lg-12">
        <?php
        echo $this->render('forms/diagrams', [

        ]);
        ?>
    </div>
</div>


<br>
<br>
<br>

<?php

\yii\helpers\VarDumper::dump($author->articlesJournals);
//echo count($author->journals);

?>
