<?php

namespace app\modules\workspace\modules\publications\controllers;

use yii\web\Controller;

/**
 * Default controller for the `units` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
