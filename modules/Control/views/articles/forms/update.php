<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <br>

    <?php

    $classes_items = \yii\helpers\ArrayHelper::map($classes, 'id', 'description');

    ?>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <!-- Subtite input - text area (max 255 chars) -->
    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'subtitle')->textArea(['rows' => 2, 'maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <!-- year publishing and DOI index input - in one row -->
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
                'yearStart' => -10,
                'yearEnd' => 10,
                ]);
            ?>
        </div>

        <div class="col-lg-7">
            <?= $form->field($model, 'doi')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <!--<?= $form->field($model, 'file')->textInput() ?>-->

    <div class="row">

        <div class="col-lg-7">

    <?= $form->field($model, 'class')->dropDownList($classes_items, [
        'prompt' => 'Выберите категорию',
        //'style' => 'width: 10px;',
    ]) ?>
        </div>

    </div>


    <div class="form-group">

        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'button big primary']) ?>
        <br>

    </div>

    <?php ActiveForm::end(); ?>

    <br>


</div>

<div class="articles-form">

    <br>

    <div class="form-inline">

        <?php

        foreach ($model_authors['data'] as $author) {
            echo Html::beginForm(['articles/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
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
