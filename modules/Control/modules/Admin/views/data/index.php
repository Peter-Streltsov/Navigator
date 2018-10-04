<?php

use yii\grid\GridView;

?>

<?php
$this->title = 'Список добавленных языков';
$this->params['breadcrumbs'][] = $this->title;
?>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Список сохраненных языков</h4>
            </div>
            <div class="panel panel-body">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                <?php

                                echo GridView::widget([
                                    'dataProvider' => $languages,
                                    'tableOptions' => [
                                        'class' => 'table table-hover'
                                    ],
                                    'columns' => [
                                        'language'
                                    ]
                                ])

                                ?>
                            </div>
                            <div class="col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <h4>Список сохраненных журналов</h4>
            </div>
            <div class="panel panel-body">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-lg-2">

                            </div>
                            <div class="col-lg-8">
                                <?php

                                echo GridView::widget([
                                    'dataProvider' => $magazines,
                                    'tableOptions' => [
                                        'class' => 'table table-hover'
                                    ],
                                    /*'columns' => [
                                        'language'
                                    ]*/
                                ])

                                ?>
                            </div>
                            <div class="col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
