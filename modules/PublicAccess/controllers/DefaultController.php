<?php

namespace app\modules\PublicAccess\controllers;

use yii\web\Controller;

/**
 * Default controller for the `PublicAccess` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        return $this->redirect('/');

    } // end action

} // end class
