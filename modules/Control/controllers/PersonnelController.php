<?php

namespace app\modules\Control\controllers;

// project classes
use app\models\common\Habilitations;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\Positions;
// yii classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
     * Lists all Personnel models
     *
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
     * Displays a single Personnel model
     *
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    } // end action



    /**
     * Updates an existing Personnel model
     * If successful, will redirect to 'view' page
     *
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
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


    /**
     * Creates author from existing Personnel model
     *
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
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
     * Deletes an existing staff member (Personnel model)
     * If deletion successful, will redirect to 'index' page
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    } // end action



    /**
     * Finds the Personnel model based on its primary key ($id)
     * If model is not found - 404 HTTP exception will be thrown
     *
     * @param $id
     * @return Personnel|null
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    protected function findModel($id)
    {

        if (($model = Personnel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
