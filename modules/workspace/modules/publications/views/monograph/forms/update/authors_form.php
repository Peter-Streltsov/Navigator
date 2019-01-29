<?php

/* @var $author_items array */
/* @var $this \yii\web\View */
/* @var $model \app\models\publications\monograph\Monograph */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

?>

<div class="panel panel-default">
    <div class="panel panel-heading">
        <h4>Авторы:</h4>
    </div>
    <div class="panel panel-body">

    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <br>

        <div class="form-inline">

            <?php

            /*foreach ($model_authors['data'] as $author) {
                echo Html::beginForm(['monographies/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
                echo Html::input('text', 'username', $author->name.' '.$author->lastname, ['class' => 'form-control', 'readonly' => true]);
                echo Html::input('hidden', 'delete', '1');
                echo Html::input('hidden', 'author', $author->id);
                echo Html::submitButton('Удалить', ['class' => 'button primary big']);
                echo Html::endForm();
                echo "<br>";
            }*/
            ?>

        </div>
    </div>