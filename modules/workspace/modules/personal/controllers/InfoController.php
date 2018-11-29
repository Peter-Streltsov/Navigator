<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes

// yii2 classes
use yii\web\Controller;

/**
 * Info controller for the `personal` module
 */
class InfoController extends Controller
{
    /**
     *
     */
    public function actionDiagone()
    {
        return $this->renderAjax('diagone', [

        ]);
    } // end action


    /**
     *
     */
    public function actionDiagtwo()
    {
        return $this->renderAjax('diagtwo', [

        ]);
    } // end action

} // end class