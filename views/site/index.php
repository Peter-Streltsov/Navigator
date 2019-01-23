<?php

/* @var $this yii\web\View */

$this->title = 'Наукометрия';
?>

<?php
$info = "<div class=\"alert alert-info\" role=\"alert\">Отсутствуют данные организации
 (название, ссылка на сетевой ресурс)
 <br>
 <br>
 Сообщение главной страницы не задано
 <br>
 <br>
 Для настройки параметров перейдите в Панель управления->Данные организации (в селекторе сохраненных данных)
 </div>";

if ($organisation->first_page_message == '{DEFAULT_MESSAGE}') {
    $message = $info;
} else {
    $message = "<div style='text-align: center; font-size: medium;' class='well'>" . $organisation->first_page_message . "</div>";
}
?>

<br>
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <?= $message; ?>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
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
    <br>
    <br>
    <br>
    <br>
