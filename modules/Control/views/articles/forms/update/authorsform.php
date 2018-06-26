<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $author_items array */
/* @var $file \app\modules\Control\models\Fileupload|mixed|string */
/* @var $model_authors \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */

?>

<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-10">

                <h4>Авторы:</h4>
                <br>

                    <?php

                    //foreach ($model_authors['data'] as $author) {
                    foreach ($model_authors as $model) {
                        echo '<div class="form-inline">';
                        echo Html::beginForm(['articles/update', 'id' => $model->id, 'authid' => $model->id], 'post');
                        echo Html::input('text', 'username', $model->author, ['style' => 'width: 55vh;', 'class' => 'form-control', 'readonly' => true]);
                        echo Html::input('text', 'part', $model->part, ['style' => 'color: green; width: 15vh;', 'class' => 'form-control', 'readonly' => true]);
                        echo Html::input('hidden', 'delete', '1');
                        echo Html::input('hidden', 'article_authors_id', $model->id);
                        echo Html::input('hidden', 'author', $model->author_id);
                        echo Html::submitButton('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', ['class' => 'btn btn-default']);
                        echo Html::endForm();
                        echo "</div>";
                        echo "<br>";
                    }
                    ?>

            </div>
            <div class="col-lg-2">
                    <br>
                    <br>
                    <br>

                    <?php

                    Modal::begin([
                        'toggleButton' => [
                            'label' => '<span style="color: green;" class="glyphicon glyphicon-plus"></span>',
                            'class' => 'btn btn-default',
                            ],
                        'options' => [
                            'width' => '200'
                        ],
                        'bodyOptions' => [
                                'width' => '150'
                        ]
                    ]);

                    $form = ActiveForm::begin();
                    //echo $form->field($model, 'author')->dropDownList($author_items, ['style' => 'width: 80vh;']);
                    //echo $form->field($model, 'part')->textInput();
                    echo Html::submitButton('Добавить', ['class' => 'button primary big']);
                    ActiveForm::end();

                    Modal::end();

                    ?>
            </div>
        </div>
    </div>
</div>