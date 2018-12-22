<?php

use yii\helpers\Html;

?>


<div class="row">
    <div class="col-lg-3">
        <?php

        if ($model->file == null) {
            echo Html::a('Редактировать данные', ['update', 'id' => $model->id], ['class' => 'button primary big']);
        }

        ?>
    </div>
</div>