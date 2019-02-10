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
                    'style' => 'color: gray;',
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

        $articles_count = $personaldata->countArticlesJournals() + $personaldata->countArticlesConferences()
            + $personaldata->countArticlesCollections();
        $dissertations_count = $personaldata->countDissertations();
        $total_count = $articles_count + $dissertations_count;

        if ($personaldata->author != null) {
            echo DetailView::widget(
                [
                    'model' => $personaldata,
                    'options' => [
                        'style' => 'color: gray;',
                        'class' => 'table table-hover'
                    ],
                    'attributes' => [
                        /*[
                            'label' => 'Общий индекс',
                            'value' => $personaldata->index
                        ],*/
                        [
                            'label' => 'Статей',
                            'value' => $articles_count
                                //$personaldata->countArticlesJournals()
                            //+ $personaldata->countArticlesConferences()
                            //+ $personaldata->countArticlesCollections()
                            //+ $personaldata->countMonographs()
                            //+ $personaldata->countDissertations()
                        ],
                        [
                            'label' => 'Монографий и книг',
                            'value' => 0
                                //$personaldata->countMonographs()
                        ],
                        [
                            'label' => 'Диссертаций',
                            'value' => $dissertations_count
                        ],
                        [
                            'label' => 'Всего публикаций',
                            'value' => $total_count
                        ]
                    ]
                ]
            );
        };
        ?>
    </div>
</div>