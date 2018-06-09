<?php

/* @var $affilation mixed */
/* @var $this \yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\modules\Control\models\ArticlesAffilations;

?>

<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-12">

                <h4>Affilation</h4>

                <?php

                $mod_affilation = new ArticlesAffilations();
                $affilation_form = ActiveForm::begin();
                echo Html::hiddenInput('affilation_flag', '1');

                if ($affilation != null) {
                    if ($affilation->type == 'self') {
                        echo $affilation_form
                            ->field($mod_affilation, 'name')
                            ->textInput(['style' => 'background-color: #ceebce;', 'value' => $affilation->name]);
                        echo Html::submitButton('Изменить', ['class' => 'button primary big']);
                    } else {
                        echo $affilation_form
                            ->field($mod_affilation, 'name')
                            ->textInput(['style' => 'background-color: #ffffe0;', 'value' => $affilation->name]);
                        echo Html::submitButton('Изменить', ['class' => 'button primary big']);
                    }
                    ActiveForm::end();
                } else {
                    echo "<b style='color: red;'>Affilation is not set</b>".PHP_EOL;
                    echo $affilation_form->field($mod_affilation, 'name')->textInput();
                    echo Html::submitButton('Сохранить', ['class' => 'button primary big']);
                    ActiveForm::end();
                }

                ?>
            </div>
        </div>
    </div>
</div>
