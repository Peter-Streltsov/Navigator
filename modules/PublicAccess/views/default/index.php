
<h3>Перечень публикаций</h3>

<br><br>

<?php

$publications =  \yii\grid\GridView::widget([
        'dataProvider' => $dataprovider
]);


echo \yii\bootstrap\Tabs::widget([
        'items' => [
                [
                        'label' => 'Публикации',
                    'content' => $publications
                ]
        ]
]);

?>
