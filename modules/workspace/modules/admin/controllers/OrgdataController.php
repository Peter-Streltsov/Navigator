<?php

namespace app\modules\workspace\modules\admin\controllers;

// project classes
use app\models\basis\Organisation;
use app\models\common\Departments;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


/**
 * Default controller for the `Control` module;
 */
class OrgdataController extends Controller
{

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Organisation::find()->where(['id' => 1])->one();

        if ($model == null) {
            $model = new Organisation();
            $model->organisation = '<b style="color: red;">название организации не задано</b>';
            $model->weblink = null;
        }

        return $this->renderAjax('index', [
            'model' => $model
        ]);
    } // end action


    /**
     * Updates Organisation model;
     * Updates organisation data (organisation name, link to web resource etc.);
     * Redirects browser to workspace/admin 'index' page (in both cases - success and error);
     *
     * @return string
     */
    public function actionUpdate()
    {
        $current_model = Organisation::find()->where(['id' => 1])->one();
        /*$new_model = new Organisation();
        if (Yii::$app->request->post()) {
            if ($new_model->load(Yii::$app->request->post())) {
                $current_model->organisation = $new_model->organisation;
                $current_model->weblink = $new_model->weblink;
                $current_model->save();
                return $this->redirect('/workspace/admin');
            }
        }*/

        if (Yii::$app->request->post() && $current_model->load(Yii::$app->request->post())) {
            $current_model->id = 1;
            $current_model->save();
            return $this->redirect('/workspace/admin');
        }

        return $this->renderAjax('update', [
            'model' => $current_model
        ]);
    } // end action


    /**
     * Lists created departments;
     *
     * @return string
     */
    public function actionDepartments()
    {

        $departments = new ActiveDataProvider([
            'query' => Departments::find()
        ]);

        return $this->renderAjax('departments', [
            'departments' => $departments
        ]);

    } // end action


    /**
     * @return string
     */
    public function actionCreatedepartment()
    {
        $departments = new ActiveDataProvider([
            'query' => Departments::find()
        ]);

        $department = new Departments();

        if ($department->load(Yii::$app->request->post())) {
            $department->save();
            return $this->renderAjax('departments', [
                'departments' => $departments
            ]);
        }

        return $this->renderAjax('create_department', [
            'department' => $department
        ]);
    } // end action

} // end class