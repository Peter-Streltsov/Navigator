<?php

namespace app\modules\Control\controllers;

use app\models\common\Cities;
use app\models\units\dissertations\Dissertations;
use app\models\units\dissertations\DissertationTypes;
use app\modules\Control\models\Authors;
use app\models\common\Habilitations;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DissertationsController implements the CRUD actions for Dissertations model.
 */
class DissertationsController extends Controller
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
     * Lists all Dissertations models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Dissertations::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * Displays a single Dissertations model.
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
     * Creates a new Dissertation record
     * If creation is successful - will redirect to 'view' page
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreate()
    {

        // new dissertation record
        $model = new Dissertations();

        $types = ArrayHelper::map(DissertationTypes::find()->asArray()->all(), 'id', 'type');

        // lists all available authors
        $authors = ArrayHelper::map(Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id', function($item) {
            return $item['name']. ' ' . $item['lastname'];
        });

        $habilitations = ArrayHelper::map(Habilitations::find()->asArray()->all(), 'id', 'habilitation');

        // lists all added cities
        $cities = ArrayHelper::map(Cities::find()->asArray()->all(), 'city', 'city');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $city = new Cities();
            $city->city = $model->city;
            $city->save(); // saving new city (if new record)
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'types' => $types,
            'habilitations' => $habilitations,
            'cities' => $cities,
            'authors' => $authors
        ]);

    } // end action



    /**
     * Updates an existing Dissertation (units/Dissertations)
     * If successful, will redirect to 'view' page
     *
     * @param integer $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $types = ArrayHelper::map(DissertationTypes::find()->asArray()->all(), 'id', 'type');
        $cities = ArrayHelper::map(Cities::find()->asArray()->all(), 'id', 'city');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'cities' => $cities,
            'types' => $types,
            'model' => $model,
        ]);

    } // end action



    /**
     * Deletes an existing Dissertation
     * If deletion successful, will redirect to 'index' page
     *
     * @param integer $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);

    } // end action



    /**
     * Finds the Dissertations model based on its primary key value
     * If the model is not found, a 404 HTTP exception will be thrown
     *
     * @param $id
     * @return Dissertations|null
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    protected function findModel($id)
    {

        if (($model = Dissertations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
