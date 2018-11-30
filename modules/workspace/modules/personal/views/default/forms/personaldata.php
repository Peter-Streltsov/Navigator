<?php

use yii\widgets\DetailView;

?>

<div class="row">
    <div class="col-lg-6">
        <?php
        if ($personaldata->author != null) {
            echo DetailView::widget([
                'model' => $personaldata->author,
                'attributes' => [
                    'name',
                    'secondname',
                    'lastname',
                    'habilitation',
                    'user_id'
                ]
            ]);
        } else {
            echo "<br> Автор не сопоставлен";
        }
        ?>
    </div>
    <div class="col-lg-6">
        <?php
        if ($personaldata->author != null) {
            echo DetailView::widget(
                [
                    'model' => $personaldata,
                    'options' => [
                        'class' => 'table table-hover'
                    ],
                    'attributes' => [
                        [
                            'label' => 'Общий индекс',
                            'value' => 0
                        ],
                        [
                            'label' => 'Статей',
                            'value' => $personaldata->countArticlesJournals()
                            + $personaldata->countArticlesConferences()
                            + $personaldata->countArticlesCollections()
                            //+ $personaldata->countMonographs()
                            + $personaldata->countDissertations()
                        ]
                    ]
                ]
            );
        };
        ?>
    </div>
</div>