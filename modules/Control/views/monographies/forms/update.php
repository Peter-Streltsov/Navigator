<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monographies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button primary big']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<div class="articles-form">

    <br>

    <div class="form-inline">

        <?php

        foreach ($model_authors['data'] as $author) {
            echo Html::beginForm(['monographies/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
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