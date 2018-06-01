<?php

use yii\widgets\DetailView;

/* @var $this \yii\web\View */
/* @var $personal \app\modules\Control\models\Personnel|array|null */
?>
<!-- -->
<div class="row">
    <div class="col-xs-12 col-md-6">
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

    <div class="col-xs-12 col-md-5">
        <img style="width: 15pc; height: 20pc;" src="/images/1.jpg" class="img-rounded">
    </div>

</div>
<!-- end block -->