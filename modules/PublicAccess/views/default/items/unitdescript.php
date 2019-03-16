<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;

?>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Заголовок:</h5>
                    <?= Html::tag('b', $model->title) ?>
                </div>
                <div class="col-lg-2">
                    <h6>Авторы</h6>
                    <?php
                    if ($model->authors != null) {
                        foreach ($model->authors as $author) {
                            echo (string)$author['name'][0] . '. ' . $author['lastname'] . '<br>';
                        }
                    } else {
                        echo "<span style='color: red;'>Авторы не сопоставлены</span>";
                    }
                    ?>
                </div>
                <div class="col-lg-2">
                    <h5>Год и место издания:</h5>
                    <?= $model['year'] ?>
                </div>
                <div class="col-lg-1">
                    <h5>Аннотация</h5>
                    <?php
                    Modal::begin([
                            'toggleButton' => [
                                'class' => 'btn-btn-default',
                                'label' => '<span class="glyphicon glyphicon-info-sign"></span>'
                            ]
                    ]);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel panel-body">
                            <?= $model['annotation'] ?>
                        </div>
                    </div>
                    <?php
                    Modal::end();
                    ?>
                </div>
                <div class="col-lg-4">
                    <h5>Цитирование:</h5>
                    <div class="panel panel-default">
                        <div class="panel panel-body">
                            <?php
                            $publisher = '';
                            if (isset($model->magazine)) {
                                $publisher = $model->magazine;
                            }
                            if (isset($model->conference_collection)) {
                                $publisher = $model->conference_collection;
                            }
                            //var_dump($model);
                            ?>
                            <?= '"' . $model['title'] . '", ' . '<br>' . $publisher ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>