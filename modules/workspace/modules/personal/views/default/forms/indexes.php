<?php

$index = $personaldata->index;
$median = $personaldata->medianIndex;

$success = '<div style="border-radius: 2pc; background-color: lightgreen;">#</div>';
$warning = '<div style="border-radius: 2pc; background-color: lightgoldenrodyellow;">#</div>';
$alert = '<div style="border-radius: 2pc; background-color: lightcoral;">#</div>';

?>
<div class="panel panel-success">
    <div class="panel panel-body">
        <div class="row">
            <div class="col-lg-5">
                <h5>Индекс <?= $index; ?></h5>
            </div>
            <div class="col-lg-5">
                <h5><?= $median; ?></h5>
            </div>
            <div class="col-lg-2">
                <?php
                if ($index > $median * 0.6) {
                    echo $success;
                } elseif ($index <= $median * 0.6 && $index > $median * 0.3) {
                    echo $warning;
                } else {
                    echo $alert;
                }
                ?>
            </div>
        </div>
    </div>
</div>