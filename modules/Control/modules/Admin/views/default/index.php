<?php

use yii\helpers\Html;

$this->title = 'Администрирование';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/admin_module.js');

?>

<br>
<br>

<div></div>

<br>

<div class="row">
    <div class="col-lg-4">
        <?php
        \yii\bootstrap\Modal::begin([
            'toggleButton' => [
                'label' => '<span class="glyphicon glyphicon-cloud-upload"> Загрузить публикации</span>',
                'class' => 'btn btn-default'
            ],
            'size' => 'modal-lg'
        ]);
        ?>
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Загрузка данных</h4>
            </div>
            <div class="panel panel-body">
                <?php
                $items = [
                    0 => '',
                    1 => 'Статьи - публикации в журналах',
                    2 => 'Статьи - публикации материалов конференций',
                    3 => 'Статьи - разделы сборников и главы книг',
                    4 => 'Монографии и книги',
                    5 => 'Диссертации'
                ];
                echo Html::dropDownList('', '', $items, [
                        'id' => 'upload',
                ]);
                ?>
                <div id="loaded"></div>
            </div>
        </div>
        <?php
        \yii\bootstrap\Modal::end();
        ?>
    </div>
    <div class="col-lg-3">
        <div class="btn-group" role="group" aria-label="...">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', '/', ['class' => 'btn btn-default']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', '/control/admin/shell', ['class' => 'btn btn-default']); ?>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-4">
        <div class="well">
            <?= Html::button('Данные организации', ['style' => 'width: 25vh;', 'id' => 'organisation', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Список отделов', ['style' => 'width: 25vh;', 'id' => 'departments', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Перечень должностей', ['style' => 'width: 25vh;', 'id' => 'positions', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Список пользователей', ['style' => 'width: 25vh;', 'id' => 'users', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Сохраненные языки', ['style' => 'width: 25vh;', 'id' => 'languages','class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Сохраненные журналы', ['style' => 'width: 25vh;', 'id' => 'magazines', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    <div class="col-lg-8">
        <div id="holder">
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
