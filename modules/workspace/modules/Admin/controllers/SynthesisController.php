<?php

namespace app\modules\workspace\modules\Admin\controllers;

// project classes
use app\models\identity\Personnel;
// yii classes
use yii\data\ActiveDataProvider;
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
