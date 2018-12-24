<?php

use yii\grid\GridView;

?>

<?php \yii\widgets\Pjax::begin(['enablePushState' => false]); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Список сохраненных языков</h4>
            </div>
            <div class="panel panel-body">
                <br>
                <p>
                    <?= \yii\helpers\Html::a('Добавить язык', '/workspace/admin/data/addlanguage', ['class' => 'button primary big']) ?>
                </p>
                <br>
                <div class="row">
                    <div class="col-lg-8">
                        <?php

                        echo GridView::widget([
                            'dataProvider' => $languages,
                            'tableOptions' => [
                                'class' => 'table table-hover'
                            ],
                            'layout' => '{items}',
                            'columns' => [
                                [
                                    'attribute' => 'language',
                                    'label' => ''
                                ]
                            ]
                        ])

                        ?>
                    </div>
                    <div class="col-lg-2">

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end(); ?>

<br>
<br>
<br>
