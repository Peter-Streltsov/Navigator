<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = 'Добавить диссертацию';
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-create">

    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <br>

    <?php

    echo $this->render('forms/create/createform', [
        'model' => $model,
        'types' => $types,
        'habilitations' => $habilitations,
        'cities' => $cities,
        'authors' => $authors
    ]);

    ?>

</div>
