<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <br>

    <div class="form-inline">

        <?php

        \yii\helpers\VarDumper::dump($_POST);

        foreach ($model['data'] as $author) {
            echo Html::beginForm(['articles/authors', 'id' => $model->id, 'authid' => $author->id], 'post');
            echo Html::input('text', 'username', $author->name.' '.$author->lastname, ['class' => 'form-control']);
            echo Html::input('hidden', 'delete', '1');
            echo Html::input('hidden', 'author', $author->id);
            echo Html::submitButton('Удалить', ['class' => 'button primary big']);
            echo Html::endForm();
            echo "<br>";
        }
        ?>

    </div>

    <div style="width:30pc;" class="form-group">


        <br>
        <br>
        <h4>Добавить автора</h4>
        <br>

        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($model, 'authors')->dropDownList($author_items); ?>
        <?= Html::submitButton('Добавить', ['class' => 'button primary big']); ?>
        <?php ActiveForm::end(); ?>

    </div>

</div>
