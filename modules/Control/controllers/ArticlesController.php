<?php

namespace app\modules\Control\controllers;

// project models
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\units\articles\Article;
use app\models\units\articles\ArticlesAffilations;
use app\models\units\articles\ArticlesAuthors;
use app\models\units\articles\ArticleTypes;
// deprecated namespaces/models
use app\modules\Control\models\ArticlesCitations;
use app\modules\Control\models\Authors;
use app\modules\Control\models\CitationClasses;
use app\modules\Control\models\Fileupload;
// framework classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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
            'query' => Article::find()//->joinWith('authors'),
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

        $model = Article::find($id)
            ->where(['articles.id' => $id])
            ->joinWith('authors')
            ->one();

        //$model[0]['class'] = $class['description'];

        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        if ($authors == null) { $authors = 'не задано';}

        return $this->render('view', [
            'model' => $model,
            'authors' => $authors,
        ]);

    } // end action



    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Article();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');
        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();
        // pnrd indexes
        $types = ArrayHelper::map(ArticleTypes::find()->asArray()->all(), 'id', 'type');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);

    } // end action



    /**
     * Updates an existing Articles model
     * Adds citations, authors etc.
     * If update is successful, will be redirected to 'update' page
     *
     * @param integer $id - article id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $newlanguage = new Languages();
        $newmagazine = new Magazines();
        $newcitation = new ArticlesCitations();
        $newauthor = new ArticlesAuthors();

        // main model - current article
        $model = Article::find()->where(['id' => $id])->one();

        if (isset($_POST['delete_text'])) {
            $model->index = null;
            $model->save();
        }

        // affilation
        if (Yii::$app->request->post() && isset($_POST['affilation_flag'])) {
            $newaffilation = new ArticlesAffilations();
            $newaffilation->article_id = $id;
            if ($newaffilation->load(Yii::$app->request->post()) && $newaffilation->save()) {
                Yii::$app->session->setFlash('success', 'Данные обновлены');
            } else {
                Yii::$app->session->setFlash('warning', 'Не удалось обновить данные');
            }
        } elseif (Yii::$app->request->post() && isset($_POST['affilation_delete'])) {
            $affilation = ArticlesAffilations::find()->where([
                'article_id' => $id,
                'name' => $_POST['affilation_delete']
            ])->one();
            $affilation->delete();
        }

        // adding citation
        if (Yii::$app->request->post() && isset($_POST['citation_flag'])) {
            $citation = new ArticlesCitations();
            if ($_POST['citation_flag'] == 'delete') {
                $citation = ArticlesCitations::find()->where(['id' => $_POST['citation_id']])->one();
                $citation->delete() ?
                    Yii::$app->session->setFlash('danger', 'Цитирование удалено')
                    : Yii::$app->session->setFlash('warning', 'Данные не были обновлены');
            } elseif ($citation->load(Yii::$app->request->post()) && $citation->save()) {
                Yii::$app->session->setFlash('success', 'Цитирование добавлено');
            }
        }

        // uploading article file
        if (Yii::$app->request->post() && isset($_POST['upload_flag'])) {
            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');
            $file->upload('articles/');
            $articlemodel = Article::find()->where(['id' => $id])->one();
            $articlemodel->file = $file->name;
            $articlemodel->save();
            Yii::$app->session->setFlash('info', 'Статье ' . $articlemodel->title . ' сопоставлен файл ' . $file->name);
        }

        // updating article authors
        if (Yii::$app->request->post()) {
            if (isset($_POST['delete']) && $_POST['delete'] == 1) {
                $author_delete = ArticlesAuthors::find()->where([
                    'id' => $_POST['article_authors_id']
                ])->one();
                $author_delete->delete();
            }
            if ($newauthor->load(Yii::$app->request->post())) {
                $newauthor->save();
            }
        }

        /**
         * basic view parameters
         */

        // authors for current article
        $model_authors = ArticlesAuthors::find()->where(['article_id' => $id])->all();

        // authors for current article
        $authors = ArrayHelper::map(
            Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        // file to upload if necessary
        $file = new Fileupload();

        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');

        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        // article
        $model = Article::find()
            ->where(['articles.id' => $id])
            ->joinWith('authors')
            ->one();

        // updating article data - articleform
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $newlanguage->language = $model->language;
                $newlanguage->save();
                $newmagazine->magazine = $model->magazine;
                $newmagazine->save();
            }
        }

        // added citations
        $citations = ArticlesCitations::find()->where(['article_id' => $id])->all();

        //$citation_classes = CitationClasses::find()->asArray()->all();
        $citation_classes = ArrayHelper::map(
            CitationClasses::find()->asArray()->all(),
            'class',
            'class'
        );

        $affilations = $model->affilations;

        // view
        return $this->render('update', [
            'affilations' => $affilations,
            'model' => $model,
            'file' => $file,
            'languages' => $languages,
            'magazines' => $magazines,
            'classes' => $classes,
            'model_authors' => $model_authors,
            'newcitation' => $newcitation,
            'newauthor' => $newauthor,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'author_items' => $authors
        ]);

    } // end action



    /**
     * Deletes an existing Articles model.
     * If deletion successful, the browser will redirect to 'index' page
     *
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
