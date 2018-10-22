<div class="row">
    <div class="col-lg-12">
        <?php
        echo \yii\widgets\DetailView::widget([
            'model' => $message,
            'attributes' => [
                'DOI',
                'type',
                'page'
            ]
        ]);
        ?>
    </div>
</div>