<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Authors;
use app\modules\Control\models\Habilitations;
use app\modules\Control\models\Positions;
use Yii;
use app\modules\Control\models\Personnel;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonnelController implements the CRUD actions for Personnel model.
 */
class PersonnelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

    } // end function



    /**
     * Lists all Personnel models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Personnel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * Displays a single Personnel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    } // end action



    /**
     * Creates a new Personnel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Personnel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    } // end action



    /**
     * Updates an existing Personnel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $classes = Positions::find()->asArray()->all();
        $habilitations = Habilitations::find()->asArray()->all();
        $habilitations = ArrayHelper::map($habilitations, 'habilitation', 'habilitation');

        return $this->render('update', [
            'model' => $model,
            'classes' => $classes,
            'habilitations' => $habilitations
        ]);

    } // end action



    public function actionMakeauthor($id)
    {

        $personnel = Personnel::find($id)->one();

        $newauthor = new Authors();
        $newauthor->name = $personnel->name;
        $newauthor->lastname = $personnel->lastname;
        $newauthor->staff_id = $personnel->id;
        $newauthor->save();

        return $this->redirect('personnel/view?id='.$id);

    } // end action



    /**
     * Deletes an existing Personnel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    } // end action



    /**
     * Finds the Personnel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personnel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = Personnel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
