<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="alert alert-danger">
    Изображение не загружено
    <br>
    <br>
    <?php

    $form = ActiveForm::begin([
            'action' => '/workspace/personal/action/loadimage',
            'options' => [
                    'enctype' => 'multipart/form-data'
            ]
    ]);
    echo $form->field($file, 'uploadedfile')->fileInput()->label('Выбрать файл...');
    echo "<br>";
    echo Html::submitButton('Загрузить');
    ActiveForm::end();
    ?>
</div>
<br>
<br>
<br>