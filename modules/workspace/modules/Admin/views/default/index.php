<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Администрирование';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/admin_module.js');

?>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-4">
        <?php
        Modal::begin([
            'toggleButton' => [
                'label' => '<span class="glyphicon glyphicon-cloud-upload"> Загрузить публикации</span>',
                'class' => 'btn btn-default',
                'style' => 'width: 16pc;'
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
        Modal::end();
        ?>
    </div>
    <div class="col-lg-3">
        <div class="btn-group" role="group" aria-label="...">
            <?= Html::a('<span class="glyphicon glyphicon-hdd"></span>', '/workspace/admin/shell', ['class' => 'btn btn-default']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-folder-open"></span>', '#', ['id' => 'filemanager', 'class' => 'btn btn-default']); ?>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-4">
        <div id="drag" class="well">
            <?= Html::button('Данные организации', ['style' => 'width: 14pc;', 'id' => 'organisation', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Список отделов', ['style' => 'width: 14pc;', 'id' => 'departments', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Перечень должностей', ['style' => 'width: 14pc;', 'id' => 'positions', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Список пользователей', ['style' => 'width: 14pc;', 'id' => 'users', 'class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Сохраненные языки', ['style' => 'width: 14pc;', 'id' => 'languages','class' => 'btn btn-default']) ?>
            <br>
            <?= Html::button('Сохраненные журналы', ['style' => 'width: 14pc;', 'id' => 'magazines', 'class' => 'btn btn-default']) ?>
        </div>
    </div>
    <div class="col-lg-8">
        <div id="holder"></div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
