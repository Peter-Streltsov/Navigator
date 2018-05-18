<?php

namespace app\modules\Control\controllers;

use yii\web\Controller;
use app\modules\Control\models\Statistics;

class StatisticsController extends Controller
{

    public function actionIndex()
    {

        $basic = Statistics::getBasic();

        $advanced = Statistics::getAdvanced();

        $timeline = Statistics::indexTimeline();

        return $this->render('index', [
            'basic' => $basic,
            'advanced' => $advanced,
            'timeline' => $timeline
        ]);

    } // end action

} // end class
