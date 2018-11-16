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
