<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\Control\models\Dissertations */

$this->title = 'Добавить диссертацию';
$this->params['breadcrumbs'][] = ['label' => 'Диссертации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dissertations-create">

    <?php

    if (Yii::$app->request->isAjax) {
        echo $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'types' => $types,
            'habilitations' => $habilitations,
            'cities' => $cities,
            'authors' => $authors
        ]);
    } else {
        echo $this->render('forms/create/createform', [
            'model' => $model,
            'types' => $types,
            'habilitations' => $habilitations,
            'cities' => $cities,
            'authors' => $authors
        ]);
    }

    ?>

</div>
