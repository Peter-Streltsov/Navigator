<?php

namespace app\modules\workspace\modules\admin\controllers;

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

        $common_data = [];
        $common_data['Драйвер базы данных'] = \Yii::$app->db->getDriverName();
        $common_data['Браузер'] = \Yii::$app->request->getUserAgent();
        $common_data['Адрес пользователя'] = \Yii::$app->request->getUserIP();

        return $this->render('index', [
            'data' => $common_data
        ]);

    } // end action

}
