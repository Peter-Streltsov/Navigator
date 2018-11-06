<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Администрирование';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/js/admin_module.js');

?>

<br>
<br>

<div class="row">
    <div class="col-lg-6">
        <div class="btn-group" role="group" aria-label="...">
            <?= Html::a('<span class="glyphicon glyphicon-console"></span>', '/workspace/admin/shell', ['class' => 'btn btn-default']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-folder-open"></span>', '#', ['id' => 'filemanager', 'class' => 'btn btn-default']); ?>
            <?= Html::a('<span class="glyphicon glyphicon-object-align-horizontal"></span>', '#', ['id' => 'filemanager', 'class' => 'btn btn-default']); ?>
            <?= Html::a('<span class="glyphicon glyphicon-off"></span>', '#', ['id' => 'clearup', 'class' => 'btn btn-default']); ?>
        </div>
        <br>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-body">
                <?= \yii\widgets\DetailView::widget([
                    'model' => $data,
                    'options' => [
                        'style' => 'border-radius: 3pc;',
                        'class' => 'table'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="well">
            <h5>Загрузка публикаций</h5>
            <?php

            $items = [
                0 => '',
                1 => 'Статьи - публикации в журналах',
                2 => 'Статьи - публикации материалов конференций',
                3 => 'Статьи - разделы сборников и главы книг',
                4 => 'Монографии и книги',
                5 => 'Диссертации',
            ];

            echo Html::dropDownList('', '', $items, [
                'id' => 'upload',
                'style' => 'width: 22pc;'
            ]);

            ?>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="well">
            <h5>Сохраненные данные</h5>
            <?php
            $data_items = [
                0 => '',
                1 => 'Данные организации',
                2 => 'Список отделов',
                3 => 'Перечень должностей',
                4 => 'Список пользователей',
                5 => 'Сохраненные языки',
                6 => 'Сохраненные журналы'
            ];

            echo Html::dropDownList('', '', $data_items, [
                'id' => 'dataselect',
                'style' => 'width: 22pc;'
            ]);

            ?>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-12">
        <div id="holder"></div>
    </div>
    <div class="col-lg-1"></div>
</div>

<br>
<br>
<br>
<br>
<br>
