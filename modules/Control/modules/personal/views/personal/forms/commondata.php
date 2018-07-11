<?php

use yii\widgets\DetailView;

/* @var $this \yii\web\View */
/* @var $personal \app\modules\Control\models\Personnel|array|null */
?>
<!-- -->
<div class="row">
    <div class="col-lg-8">
        <?= DetailView::widget([
            'model' => $personal,
            'options' => [
                'class' => 'table'
            ],
            'attributes' => [
                'lastname',
                'name',
                'secondname',
                'age',
                'position',
                'habilitation'
            ]
        ]);
        ?>
    </div>

    <div class="col-lg-4">
        <img style="border-radius: 3pc;max-width: 15pc; max-height: 20pc;" src="/images/1.jpg" class="img-rounded">
    </div>

</div>
<!-- end block -->