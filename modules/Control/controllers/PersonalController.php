<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Users;

class PersonalController extends \yii\web\Controller
{

    /**
     * @param $id
     * @return string
     */
    public function actionIndex($id)
    {

        $model = Users::find()->where(['id' => $id])->one();

        return $this->render('index', [
            'model' => $model
        ]);

    } // end action



    /**
     *
     */
    public function actionMessage()
    {

    } // end action

} // end class
