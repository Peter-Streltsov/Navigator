<?php

use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $dataprovider yii\data\ActiveDataProvider*/

?>

<h3>Перечень публикаций</h3>

<br><br>

<?php

/*$listed = \yii\widgets\ListView::widget([
    'dataProvider' => $dataprovider,
    'itemView' => 'items/unitdescript'
]);*/

?>

<ul class="nav nav-tabs">
    <li class="active"><a href="#articles">Статьи</a></li>
    <li><a href="#monograph">Книги и монографии</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="articles" role="tabpanel">
        <br>
        <br>
        <div class="alert alert-warning" role="alert">
            Раздел находится в разработке
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php
        //$listed
        ?>
    </div>
    <div class="tab-pane" id="monograph" role="tabpanel">
        <h5>Under development</h5>
    </div>
</div>
