<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\IndexesArticles;
use Yii;
use app\modules\Control\models\Articles;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\DetailView;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
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

    }  // end function



    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find()->joinWith('authors'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * @return string
     */
    public function actionTest()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find()->joinWith('authors')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = Articles::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('data')
            ->all();


        return $this->render('view', [
        'model' => $model
        ]);

    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Articles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    } // end action



    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = Articles::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('data')
            ->all();

        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        if (Yii::$app->request->post()) {

            //return VarDumper::dump($model);

            if ($model[0]->load(Yii::$app->request->post()) && $model[0]->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        $authors = Authors::find()->select(['id', 'lastname', 'name'])->asArray()->all();

        return $this->render('update', [
            'model' => $model[0],
            'classes' => $classes,
            //'authors' => $authors
        ]);

    } // end action


    /**
     * adding author
     *
     * @param $id
     * @return string
     */
    public function actionAuthors($id)
    {

        if (Yii::$app->request->post()) {

            if (isset($_POST['delete']) && $_POST['delete'] == 1) {
                $author_delete = ArticlesAuthors::find()->where([
                    'author_id' => $_POST['author'],
                    'article_id' => $id
                ])->one();
                //return VarDumper::dump($author_delete);
                $author_delete->delete();
                //return;
            }

            if (isset($_POST['Articles'])) {
                $newauthor = new ArticlesAuthors();
                $newauthor->article_id = $id;
                $newauthor->author_id = $_POST['Articles']['authors'];
                $newauthor->save();
            }

        }

        $model = Articles::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('data')
            ->all();

        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        $items = \yii\helpers\ArrayHelper::map($authors, 'id', function($items) {
            return $items['name']. ' ' . $items['lastname'];
        });


        return $this->render('authors', [
            'model' => $model[0],
            'authors' => $authors,
            'author_items' => $items
        ]);

    } // end function



    /**
     * Deletes an existing Articles model.
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
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {

        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end action

} // end class
