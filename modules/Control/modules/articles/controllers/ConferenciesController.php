<?php

namespace app\modules\Control\modules\articles\controllers;

// project classes
use app\models\units\articles\conferencies\Article;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConferenciesController implements the CRUD actions for ArticleConferencies model.
 */
class ConferenciesController extends Controller
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
     * Lists all ArticleConferencies models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * Displays a single ArticleConferencies model
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
     * Creates a new ArticleConferencies model.
     * If creation successful, will be redirect to 'view' page
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreate()
    {

        $model = new ArticleConferencies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    } // end action



    /**
     * Updates an existing ArticleConferencies model.
     * If update successful, will redirect to 'view' page
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

        return $this->render('update', [
            'model' => $model,
        ]);

    } // end action



    /**
     * Deletes an existing ArticleConferencies model.
     * If deletion successful, will be redirect to 'index' page
     *
     * @param $id
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
     * Finds the ArticleConferencies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown
     *
     * @param $id
     * @return ArticleConferencies|null
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    protected function findModel($id)
    {

        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
