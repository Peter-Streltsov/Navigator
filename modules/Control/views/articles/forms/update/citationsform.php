<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $citations \app\modules\Control\models\ArticlesCitations[]|array|static */
/* @var $citation_classes  */
/* @var $newcitation \app\modules\Control\models\ArticlesCitations */
/* @var $model \app\modules\Control\models\Articles|mixed|\yii\db\ActiveRecord */
?>

<br>
<br>

<div class="panel panel-default">
    <div class="panel panel-body">

        <h4>Цитирования:</h4>

        <br>


        <div class="row">
            <div class="col-lg-10">
                <?php

                $i = 1;
                foreach ($citations as $key => $citation) {
                    echo "<div class='form-inline'>";

                    echo Html::beginForm('', 'post');
                    echo Html::input('hidden', 'citation_flag', 'delete');
                    echo Html::input('hidden', 'citation_id', $citation->id);
                    echo Html::input('text', '', $i, ['style' => 'width: 5vh;', 'class' => 'form-control', 'readonly' => true]);
                    echo Html::input('text', 'title', $citation->title, ['style' => 'width: 50vh;', 'class' => 'form-control', 'readonly' => true]);
                    echo Html::input('text', 'class', $citation->class, ['style' => 'width: 15vh;', 'class' => 'form-control', 'readonly' => true]);
                    echo Html::submitButton('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', ['class' => 'btn btn-default']);
                    echo Html::endForm();
                    echo "</div>";
                    echo "<br>";
                    $i++;
                }

                ?>
            </div>
            <div class="col-lg-2">

                <?php

                Modal::begin([
                    'toggleButton' => [
                        'label' => '<span style="color: green;" class="glyphicon glyphicon-plus"></span>',
                        'class' => 'btn btn-default'
                    ]

                ]);

                $citations = ActiveForm::begin();

                echo Html::hiddenInput('citation_flag', '1');
                echo $citations->field($newcitation, 'title')->textInput();
                echo $citations->field($newcitation, 'class')->dropDownList($citation_classes);
                echo $citations->field($newcitation, 'article_id')->textInput(['value' => $model->id, 'readonly' => true]);


                echo Html::submitButton('Сохранить', ['class' => 'button primary big']);

                //$citations::end();
                ActiveForm::end();

                Modal::end();

                ?>

            </div>
        </div>
    </div>
</div>