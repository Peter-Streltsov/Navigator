<?php

namespace app\modules\workspace\modules\Admin\controllers;

// project classes
use app\models\basis\Organisation;
// yii classes
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    /**
     * Renders index view for Admin module
     * Index view contains no specific data, only ajax-buttons for requesting forms
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');

    } // end action

}
