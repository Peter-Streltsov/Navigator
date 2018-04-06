<?php
/* @var $this yii\web\View */
?>

<?php $this->title = 'Личный кабинет - ' . $model->name.  ' ' . $model->lastname ?>

<h3><?= \yii\bootstrap\Html::encode($this->title); ?></h3>

<?= \yii\helpers\Html::a('Отправить сообщение', 'control/personal/message', ['class' => 'button primary big']); ?>
