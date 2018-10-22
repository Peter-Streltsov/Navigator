<?php

namespace app\modules\Control\modules\personal\PersonalModule\uploads\controllers;

use yii\web\Controller;

/**
 * Default controller for the `uploads` module
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
