<?php

use yii\helpers\Html;

$this->title = 'Проверка публикации по ЦИО (DOI)';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
?>

<br>

<div class="row">
    <div class="col-lg-10">
        <br>
        <?php
        echo Html::beginForm('/control/webapi/crossref', 'post');
        echo Html::label('Введите идентификатор:  ');
        echo "<br>";
        echo Html::input('text', 'DOI');
        echo Html::submitButton('Поиск');
        echo Html::endForm();
        ?>
    </div>
</div>

<br>
<br>

<?php
?>

<?php

\yii\helpers\VarDumper::dump($article);

if ($article != null) {
    echo $article['status'];
}

?>
