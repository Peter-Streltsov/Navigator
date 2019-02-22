<?php

$index = $personaldata->index;
$median = $personaldata->medianIndex;

$success = '<div style="border-radius: 2pc; background-color: lightgreen;">#</div>';
$warning = '<div style="border-radius: 2pc; background-color: lightgoldenrodyellow;">#</div>';
$alert = '<div style="border-radius: 2pc; background-color: lightcoral;">#</div>';

?>
<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-4">
                <b style="color: gray;">Индекс <?= $index; ?></b>
            </div>
            <div class="col-lg-5">
                <b style="color: gray;"><?= $median; ?></b>
            </div>
            <div class="col-lg-3">
                <?php
                if ($index > $median * 0.6) {
                    //echo $success;
                    $color = 'lightgreen';
                    $message = 'Ваш индекс выше среднего';
                } elseif ($index <= $median * 0.6 && $index > $median * 0.3) {
                    //echo $warning;
                    $color = 'lightgoldenyellow';
                    $message = 'Ваш индекс находится в средней группе';
                } else {
                    //echo $alert;
                    $color = 'lightcoral';
                    $message = 'Ваш индекс ниже значений средней группы';
                }
                \yii\bootstrap\Modal::begin([
                        'toggleButton' => [
                            'class' => 'btn btn-success',
                            'style' => "color: $color;",
                            'label' => '<span class="glyphicon glyphicon-question-sign"></span>'
                        ]
                ]);
                echo "<br><br>";
                echo $message;
                echo "<br><br><br>";
                \yii\bootstrap\Modal::end();
                ?>
            </div>
        </div>
    </div>
</div>