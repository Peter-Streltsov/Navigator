<?php

use yii\helpers\Html;

?>

<?= Html::a('<span class="glyphicon glyphicon-comment"></span>', ['/control/personal/action/create', 'id' => $model->id], ['class' => 'button primary big']); ?>
<?= Html::a('<span class="glyphicon glyphicon-send"></span>', ['/control/personal/notofications', 'id' => $model->id], ['class' => 'button primary big']); ?>
<!--<?= Html::a('Загрузить данные <span class="glyphicon glyphicon-upload"></span>', ['/control/personal/upload'], ['class' => 'button primary big']) ?>-->
<?= Html::a('<span class="glyphicon glyphicon-upload"></span>', '#', ['id' => 'uploadbutton', 'class' => 'button primary big']) ?>