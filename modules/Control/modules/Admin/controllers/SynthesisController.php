<?php

namespace app\modules\Control\modules\Admin\controllers;

use app\modules\Control\models\Personnel;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\web\Controller;

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
