<?php

namespace app\modules\workspace\modules\personal\controllers;

// project classes
use app\models\pnrd\PersonalData;
// yii2 classes
use Yii;
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
        $model = Yii::$app->user->getIdentity();
        $personal = new PersonalData($model);
        return $this->renderAjax('diagone', [
            'personal' => $personal
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