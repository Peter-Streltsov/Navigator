<?php

namespace app\modules\Control\modules\Admin\controllers;

// project classes
use app\models\basis\Organisation;
// yii2 classes
use Yii;
use yii\web\Controller;


/**
 * Default controller for the `Control` module
 */
class OrgdataController extends Controller
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



    public function actionUpdate()
    {

        $model = Organisation::find()->one();

        if (Yii::$app->request->post()) {
            $model = new Organisation();
            $model->load(Yii::$app->request->post());
            $model->id = 1;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные обновлены');
            } else {
                Yii::$app->session->setFlash('danger', 'Не удалось обновить данные');
            }
        }

        if ($model == null) {
            $model = new Organisation();
        }

        return $this->render('update', [
            'model' => $model
        ]);

    } // end action

} // end class