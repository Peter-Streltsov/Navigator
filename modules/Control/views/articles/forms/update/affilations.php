<?php

/* @var $affilation mixed */
/* @var $this \yii\web\View */
/* @var $affilations  */

use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use app\models\units\articles\ArticlesAffilations;

?>

<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-10">

                <h4>Affilation:</h4>

                <br>

                <?php

                $mod_affilation = new ArticlesAffilations();

                if (is_array($affilations) && $affilations != null) {
                    foreach ($affilations as $key => $affilation) {
                        echo '<div class="form-inline">';
                        echo Html::beginForm();
                        echo Html::input('text', 'name', $affilation->name, ['style' => 'width: 70vh;', 'class' => 'form-control', 'readonly' => true]);
                        echo Html::submitButton('<span style="color: red;" class="glyphicon glyphicon-remove"></span>', ['class' => 'btn btn-default']);
                        echo Html::endForm();
                        echo '</div>';
                        echo "<br>";
                    }
                } else {
                    echo "<b style='color: red;'>Affilation is not set</b>".PHP_EOL;
                    //echo Html::submitButton('Сохранить', ['class' => 'button primary big']);
                    //ActiveForm::end();
                }

                ?>
            </div>
            <div class="col-lg-2">

                <br>
                <br>
                <br>

                <?php
                Modal::begin([
                    'header' => '<h4>Add affilation</h4>',
                    'toggleButton' => [
                        'label' => '<span style="color: green;" class="glyphicon glyphicon-plus"></span>',
                        'class' => 'btn btn-default'
                    ],
                ]);

                echo "<br><br>";

                $form = ActiveForm::begin();

                echo Html::hiddenInput('affilation_flag', '1');
                echo $form->field($mod_affilation, 'name')->textInput();

                echo "<br>";

                //echo Html::hiddenInput('affilation_delete', $affilation->id);
                echo Html::submitButton('Сохранить', ['class' => 'button primary big']);

                ActiveForm::end();

                Modal::end();
                ?>
            </div>
        </div>
    </div>
</div>
