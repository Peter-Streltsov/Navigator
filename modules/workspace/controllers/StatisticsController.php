<?php

namespace app\modules\workspace\controllers;

use yii\web\Controller;
use app\modules\Control\units\Statistics;

/**
 * Class StatisticsController
 *
 * @package app\modules\Control\controllers
 */
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
