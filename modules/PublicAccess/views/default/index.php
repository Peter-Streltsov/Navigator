<?php

use yii\grid\GridView;
use yii\bootstrap\Tabs;

?>

<h3>Перечень публикаций</h3>

<br><br>

<?php

$publications =  GridView::widget([
        'dataProvider' => $dataprovider
]);

$listed = \yii\widgets\ListView::widget([
    'dataProvider' => $dataprovider,
    'itemView' => 'items/unitdescript'
]);

echo "<br><br>";

echo Tabs::widget([
        'items' => [
            [
                'label' => 'Публикации',
                'content' => $listed
            ]
        ]
]);

?>
