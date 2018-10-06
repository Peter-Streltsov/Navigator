<?php

namespace app\modules\Control\modules\Admin\controllers;

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
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = Organisation::find()->one();

        if ($model == null) {
            $model = new Organisation();
            $model->organisation = '<b style="color: red;">название организации не задано</b>';
            $model->weblink = null;
        }

        return $this->render('index', [
            'model' => $model
        ]);
    } // end action

}
