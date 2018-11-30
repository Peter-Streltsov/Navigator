<?php

use yii\widgets\DetailView;

?>

<div class="row">
    <div class="col-lg-6">
        <?php
        if ($personaldata->author != null) {
            echo DetailView::widget([
                'model' => $personaldata->author,
                'options' => [
                        'class' => 'table table-hover'
                ],
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
                            'value' => $personaldata->index
                        ],
                        [
                            'label' => 'Статей',
                            'value' => $personaldata->countArticlesJournals()
                            + $personaldata->countArticlesConferences()
                            + $personaldata->countArticlesCollections()
                            //+ $personaldata->countMonographs()
                            + $personaldata->countDissertations()
                        ],
                        /*[
                            'label' => 'Монографий и книг',
                            'value' => $personaldata->countMonographs()
                        ],*/
                        [
                            'label' => 'Диссертаций',
                            'value' => $personaldata->countDissertations()
                        ]
                    ]
                ]
            );
        };
        ?>
    </div>
</div>