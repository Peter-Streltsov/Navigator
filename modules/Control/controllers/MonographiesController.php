<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Authors;
use app\modules\Control\models\MonographiesAuthors;
use Yii;
use app\modules\Control\models\Monographies;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MonographiesController implements the CRUD actions for Monographies model.
 */
class MonographiesController extends Controller
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
    }

    /**
     * Lists all Monographies models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = Monographies::find()->joinWith('authors')->all();

        $dataProvider = new ActiveDataProvider([
            'query' => Monographies::find()->joinWith('authors')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);

    } // end action



    /**
     * Displays a single Monographies model.
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
     * Creates a new Monographies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Monographies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    } // end action




    /**
     * Updates an existing Monographies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if (Yii::$app->request->post()) {

            if (isset($_POST['delete']) && $_POST['delete'] == 1) {
                $author_delete = MonographiesAuthors::find()->where([
                    'author_id' => $_POST['author'],
                    'monography_id' => $id
                ])->one();
                $author_delete->delete();
                Yii::$app->session->setFlash('danger', "Автор удален");
            }

            if (isset($_POST['Monographies'])) {
                $newauthor = new MonographiesAuthors();
                $newauthor->monography_id = $id;
                $newauthor->author_id = $_POST['Monographies']['authors'];
                $newauthor->save();
                Yii::$app->session->setFlash('success', "Автор добавлен");
            }

        }

        $model_authors = Monographies::find($id)
            ->where(['monographies.id' => $id])
            ->joinWith('data')
            ->all();


        // all authors
        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();
        $items = \yii\helpers\ArrayHelper::map($authors, 'id', function($items) {
            return $items['name']. ' ' . $items['lastname'];
        });

        $model = Monographies::find($id)
            ->where(['monographies.id' => $id])
            ->joinWith('data')
            ->all();

        return $this->render('update', [
            'model' => $model[0],
            'model_authors' => $model_authors[0],
            'authors' => $authors,
            'author_items' => $items
        ]);

    } // end action



    /**
     * Deletes an existing Monographies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Monographies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Monographies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Monographies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
