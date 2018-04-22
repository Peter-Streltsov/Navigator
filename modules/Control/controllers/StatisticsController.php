<?php

namespace app\modules\Control\controllers;

use yii\web\Controller;
use app\modules\Control\models\Statistics;

class StatisticsController extends Controller
{

    public function actionIndex()
    {

        $basicdata = Statistics::getBasic();

        $advanceddata = Statistics::getAdvanced();

        return $this->render('index', [
            'basic' => $basicdata,
            'advanced' => $advanceddata
        ]);

    } // end action

} // end class
