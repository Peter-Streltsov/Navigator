<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

?>

<!--<?= Html::a('<span class="glyphicon glyphicon-comment"></span>', ['/workspace/personal/action/create', 'id' => $model->id], ['class' => 'button primary big']); ?>-->
<?php

Modal::begin([
        'toggleButton' => [
                'label' => '<span class="glyphicon glyphicon-comment"></span>',
            'class' => 'button primary big'
        ]
]);

$messageform = \yii\widgets\ActiveForm::begin();
echo $messageform->field($message, 'username')->textInput(['value' => 'user']);
echo $messageform->field($message, 'text')->textarea();
echo "<br><br>";
echo Html::submitButton('Отправить', ['class' => 'btn btn-default']);
\yii\widgets\ActiveForm::end();
Modal::end();

Modal::begin([
        'toggleButton' => [
            'label' => '<span class="glyphicon glyphicon-send"></span>',
            'class' => 'button primary big'
        ]
]);
echo \yii\grid\GridView::widget([
        'dataProvider' => $notifications
]);
Modal::end();
?>
<!--<?= Html::a('<span class="glyphicon glyphicon-send"></span>', ['/workspace/personal/action/see', 'what' => 'notifications', 'id' => $model->id], ['id' => 'notifications', 'class' => 'button primary big']); ?>-->
<!--<?= Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/workspace/personal/upload'], ['class' => 'button primary big']) ?>-->
<?= Html::a('<span class="glyphicon glyphicon-upload"></span>', '#', ['id' => 'uploadbutton', 'class' => 'button primary big']) ?>

<br>
<br>

<div class="row">
    <div class="col-lg-10">
        <div class="well">
            <?php
            //\yii\helpers\VarDumper::dump($author);
            if ($author->id != null) {
                echo Html::tag('text', 'Автор', ['style' => 'color: green;']);
            } else {
                echo Html::tag('text', 'Автор не сопоставлен', ['style' => 'color: red;']);
            }
            ?>
            <div align="right">
                <?= Html::a('Подробнее>>>', '#', ['style' => 'font-size: 12px;']) ?>
            </div>
        </div>
        <div class="well">

        </div>
    </div>
</div>
