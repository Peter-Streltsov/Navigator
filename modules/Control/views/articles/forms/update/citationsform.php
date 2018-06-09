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
        <div class="row">
            <div class="col-lg-8">
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $citations,
                    'tableOptions' => [
                        'class' => 'table'
                    ],
                    'columns' => [
                        'title',
                        'class',
                    ]
                ]) ?>
            </div>
            <div class="col-lg-4">

                <?php

                Modal::begin([
                    'toggleButton' => [
                        'label' => 'Добавить цитирование',
                        'class' => 'button primary big'
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