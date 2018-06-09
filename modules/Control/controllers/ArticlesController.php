<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\ArticlesAffilations;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\ArticlesCitations;
use app\modules\Control\models\Authors;
use app\modules\Control\models\CitationClasses;
use app\modules\Control\models\Fileupload;
use app\modules\Control\models\IndexesArticles;
use app\modules\Control\models\Upload;
use app\widgets\Alert;
use Yii;
use app\modules\Control\models\Articles;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
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
     * Lists all Articles models
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
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = Articles::find($id)
            ->where(['articles.id' => $id])
            //->join('LEFT JOIN', 'indexes_articles', ['class' => 'indexes_articles.id'])
            ->joinWith('data')
            ->all();

        $class = IndexesArticles::find()->where(['id' => $model[0]['class']])->asArray()->one();
        $model[0]['class'] = $class['description'];

        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        if ($authors == null) { $authors = 'не задано';}

        return $this->render('view', [
            'model' => $model,
            'authors' => $authors,
            'class' => $class
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

        $classes = IndexesArticles::find()->asArray()->all();

        return $this->render('create', [
            'model' => $model,
            'classes' => $classes
        ]);

    } // end action



    /**
     * Updates an existing Articles model;
     * Adds citations, authors etc.
     * If update is successful, the browser will be again redirected to 'update' page
     *
     * @param integer $id - article id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        // affilation
        if (Yii::$app->request->post() && isset($_POST['affilation_flag'])) {
            $newaffilation = ArticlesAffilations::find()->where(['article_id' => $id])->one();
            if ($newaffilation == null) {
                $newaffilation = new ArticlesAffilations();
            }
            $newaffilation->article_id = $id;
            if ($newaffilation->load(Yii::$app->request->post()) && $newaffilation->save()) {
                Yii::$app->session->setFlash('success', 'Данные обновлены');
            } else {
                Yii::$app->session->setFlash('warning', 'Не удалось обновить данные');
            }
        }

        // adding citation
        if (Yii::$app->request->post() && isset($_POST['citation_flag'])) {
            $citation = new ArticlesCitations();
            if ($citation->load(Yii::$app->request->post()) && $citation->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        // uploading article file
        if (Yii::$app->request->post() && isset($_POST['upload_flag'])) {
            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');
            $file->upload('articles/');
            $articlemodel = Articles::find()->where(['id' => $id])->one();
            $articlemodel->file = $file->name;
            $articlemodel->save();
            Yii::$app->session->setFlash('info', 'Статье ' . $articlemodel->title . ' сопоставлен файл ' . $file->name);
        }

        // updating article authors
        if (Yii::$app->request->post()) {
            if (isset($_POST['delete']) && $_POST['delete'] == 1) {
                $author_delete = ArticlesAuthors::find()->where([
                    'author_id' => $_POST['author'],
                    'article_id' => $id
                ])->one();
                $author_delete->delete();
            }
            if (isset($_POST['Articles']['authors'])) {
                $newauthor = new ArticlesAuthors();
                $newauthor->article_id = $id;
                $newauthor->author_id = $_POST['Articles']['authors'];
                $newauthor->save();
            }
        }

        // view parameters

        $model_authors = Articles::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('data')
            ->all();

        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        $items = \yii\helpers\ArrayHelper::map($authors, 'id', function($items) {
            return $items['name']. ' ' . $items['lastname'];
        });

        $file = new Fileupload();

        $model = Articles::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('data')
            ->all();

        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        // updating article data
        if (Yii::$app->request->post()) {
            if ($model[0]->load(Yii::$app->request->post()) && $model[0]->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        //$citations = ArticlesCitations::find()->all();
        $citations = new ActiveDataProvider([
            'query' => ArticlesCitations::find()->where(['article_id' => $id])
        ]);
        $citation_classes = CitationClasses::find()->asArray()->all();
        $citation_classes = ArrayHelper::map($citation_classes, 'class', 'class');

        $newcitation = new ArticlesCitations();

        $affilation = $model[0]->affilation;

        // view
        return $this->render('update', [
            'affilation' => $affilation,
            'model' => $model[0],
            'file' => $file,
            'classes' => $classes,
            'model_authors' => $model_authors[0],
            'newcitation' => $newcitation,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'authors' => $authors,
            'author_items' => $items
        ]);

    } // end action



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
