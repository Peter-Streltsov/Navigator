<div class="Control-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
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
