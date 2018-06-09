<?php

/* @var $author_items array */
/* @var $file \app\modules\Control\models\Fileupload|mixed|string */
/* @var $model_authors \app\modules\Control\models\Articles|\app\modules\Control\models\IndexesArticles */
/* @var $this \yii\web\View */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

?>

<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-6">

                <h4>Авторы:</h4>
                <br>

                <div class="form-inline">

                    <?php

                    foreach ($model_authors['data'] as $author) {
                        echo Html::beginForm(['articles/update', 'id' => $model_authors->id, 'authid' => $author->id], 'post');
                        echo Html::input('text', 'username', $author->name.' '.$author->lastname, ['class' => 'form-control', 'readonly' => true]);
                        echo Html::input('hidden', 'delete', '1');
                        echo Html::input('hidden', 'author', $author->id);
                        echo Html::submitButton('Удалить', ['class' => 'button primary big']);
                        echo Html::endForm();
                        echo "<br>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-6">
                    <br>
                    <br>
                    <br>

                    <?php

                    Modal::begin([
                        'toggleButton' => [
                            'label' => 'Добавить автора',
                            'class' => 'button primary big',
                            ]
                    ]);

                    $form = ActiveForm::begin();
                    echo $form->field($model, 'authors')->dropDownList($author_items);
                    echo Html::submitButton('Добавить', ['class' => 'button primary big']);
                    ActiveForm::end();

                    Modal::end();

                    ?>
            </div>
        </div>
    </div>
</div>