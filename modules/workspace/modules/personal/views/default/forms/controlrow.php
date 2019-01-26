<?php

// yii classes
use yii\helpers\Html;
use yii\bootstrap\Modal;

?>



<?php

//--------------------------------------------------------------------------------------------------------------------//

/**
 * message sending form in modal window;
 */
Modal::begin([
        'toggleButton' => [
            'label' => '<span class="glyphicon glyphicon-comment"></span>',
            'class' => 'button primary big'
        ]
]);

$messageform = \yii\widgets\ActiveForm::begin();
echo $messageform->field($message, 'user_id')->hiddenInput(['value' => $model->id])->label('');
echo $messageform->field($message, 'username')->textInput(['type' => 'hidden', 'value' => 'user'])->label('');
echo $messageform->field($message, 'category')->textInput();
echo $messageform->field($message, 'text')->textarea();
echo "<br><br>";
echo Html::submitButton('Отправить', ['class' => 'btn btn-default']);
\yii\widgets\ActiveForm::end();
Modal::end();

/**
 * end of message sending form;
 */

//--------------------------------------------------------------------------------------------------------------------//

/**
 * notifications form;
 */
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

/**
 *
 */

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<!--<?= Html::a('<span class="glyphicon glyphicon-send"></span>', ['/workspace/personal/action/see', 'what' => 'notifications', 'id' => $model->id], ['id' => 'notifications', 'class' => 'button primary big']); ?>-->
<!--<?= Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/workspace/personal/upload'], ['class' => 'button primary big']) ?>-->
<?= Html::a('<span class="glyphicon glyphicon-upload"></span>', '#', ['id' => 'uploadbutton', 'class' => 'button primary big']) ?>
