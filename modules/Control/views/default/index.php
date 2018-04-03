<div class="Control-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>

        <?php
            \yii\helpers\VarDumper::dump($data);
        ?>

        <?php

        $graphdata = [$data, []];

        echo \sibilino\y2dygraphs\DygraphsWidget::widget([
                'data' => [
                        [$data['users'], $data['authors.php']]
                ]
        ]);
        ?>
    </p>
</div>
