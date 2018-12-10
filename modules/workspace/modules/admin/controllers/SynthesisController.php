<?php

namespace app\modules\workspace\modules\admin\controllers;

// project classes
use app\models\identity\Personnel;
// yii classes
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Class SynthesisController
 *
 * @package app\modules\workspace\modules\admin\controllers
 */
class SynthesisController extends Controller
{

    public function actionIndex()
    {
        $staff = new ActiveDataProvider([
            'query' => Personnel::find()
        ]);

        return $this->render('index', [
            'model' => $staff
        ]);
    } // end action

} // end class
