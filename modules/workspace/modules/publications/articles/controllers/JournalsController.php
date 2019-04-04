<?php

namespace app\modules\workspace\modules\publications\articles\controllers;

// project models
use app\interfaces\PublicationControllerInterface;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\publications\articles\journals\ArticleJournal;
use app\models\publications\articles\journals\Associations;
use app\models\publications\articles\journals\Authors;
use app\models\publications\articles\journals\Citations;
use app\models\publications\articles\journals\Pages;
use app\models\publications\CitationClasses;
use app\models\identity\Authors as AuthorsCommon;
use app\models\filesystem\Fileupload;
// yii classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * JournalsController - implements the CRUD actions for articles, published in journals only;
 * base model - app\models\units\articles\ArticleJournal;
 */
class JournalsController extends Controller implements PublicationControllerInterface
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
     * Lists all Articles models;
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ArticleJournal::find()//->joinWith('authors'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } // end action


    /**
     * Displays a single ArticleJournals model;
     *
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = ArticleJournal::find($id)
            ->where(['id' => $id])
            ->one();

        return $this->render('view', [
            'model' => $model,
            //'authors' => $authors,
        ]);
    } // end action


    /**
     * Creates a new Articles;
     * If successful, will redirect to 'view' page;
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreate()
    {
        /**
         * view parameters
         */

        // article model
        $model = new ArticleJournal();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        // magazines list
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');
        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();
        // pnrd indexes
        $types = $model->availableTypes;

        /**
         * saving base model or collecting errors (converting to string) if not succeeded
         */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } elseif (Yii::$app->request->post() && !$model->save()) {
            foreach ($model->getErrors() as $error) {
                $message[] = implode(' ', $error);
            }
            $errors = implode('<br>', $message);
            Yii::$app->session->setFlash('danger', 'Сохранение не удалось' . '<br><br>' . $errors);
        }

        // rendering view
        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Creates a new Articles
     * If successful, will redirect to 'view' page
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreateAjax()
    {
        /**
         * view parameters
         */

        // article model
        $model = new ArticleJournal();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        // magazines list
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');
        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();
        // pnrd indexes
        $types = $model->availableTypes;

        /**
         * saving base model or collecting errors (converting to string) if not succeeded
         */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } elseif (Yii::$app->request->post() && !$model->save()) {
            foreach ($model->getErrors() as $error) {
                $message[] = implode(' ', $error);
            }
            $errors = implode('<br>', $message);
            Yii::$app->session->setFlash('danger', 'Сохранение не удалось' . '<br><br>' . $errors);
        }

        // rendering view
        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Updates an existing Articles model;
     * Adds citations, authors etc;
     * If update successful, will redirect to 'update' page;
     *
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionUpdate($id)
    {
        //------------------------------------------------------------------------------------------------------------//

        /**
         * checking user access rights;
         */
        if (!Yii::$app->access->isAdmin()) {
            return $this->redirect('/workspace');
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $newmagazine = new Magazines();
        $newcitation = new Citations();
        $newauthor = new Authors();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * uploading article file
         */
        if (Yii::$app->request->post() && isset($_POST['upload_flag'])) {
            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');
            $file->upload('articles/');
            $articlemodel = ArticleJournal::find()->where(['id' => $id])->one();
            $articlemodel->file = $file->name;
            $articlemodel->save();
            Yii::$app->session->setFlash(
                'info',
                'Статье ' . $articlemodel->title . ' сопоставлен файл ' . $file->name
            );
        }

        //------------------------------------------------------------------------------------------------------------//

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * authors for current article
         */
        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        //------------------------------------------------------------------------------------------------------------//

        // file to upload if necessary
        $file = new Fileupload();

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        //-------------------------------------------------------------------//

        // article categories (pnrd)
        /**
         *
         */
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        //-------------------------------------------------------------------//

        // article
        /**
         *
         */
        $model = ArticleJournal::find()
            ->where(['id' => $id])
            ->one();

        //-------------------------------------------------------------------//

        // updating article data - articleform
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $newmagazine->magazine = $model->magazine;
                $newmagazine->save();
            }
        }

        //-------------------------------------------------------------------//

        // added languages list
        /**
         *
         */
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');

        //-------------------------------------------------------------------//

        // added citations
        //$citations = $model->citations();
        /**
         *
         */
        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['article_id' => $id])
        ]);

        //-------------------------------------------------------------------//

        /**
         *
         */
        $citation_classes = ArrayHelper::map(
            CitationClasses::find()->asArray()->all(),
            'class',
            'class'
        );

        //-------------------------------------------------------------------//

        /**
         *
         */
        $associations = new ActiveDataProvider([
            'query' => Associations::find()->where(['article_id' => $id])
        ]);

        //-------------------------------------------------------------------//

        /**
         * rendering view;
         */
        return $this->render('update', [
            'linked_authors' => $linked_authors,
            'associations' => $associations,
            'model' => $model,
            'file' => $file,
            'languages' => $languages,
            'magazines' => $magazines,
            'classes' => $classes,
            'newcitation' => $newcitation,
            'newauthor' => $newauthor,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'author_items' => $author_items,
            'id' => $id
        ]);

    } // end action

    /******************************************************************************************************************/


    /******************************************************************************************************************/
    /***** AJAX actions ***********************************************************************************************/


    /**
     * Adds new author (articles/journals/Authors model) to current article;
     */
    public function actionAuthor($id)
    {
        $author = new Authors();

        if (Yii::$app->request->post()) {
            if ($author->load(Yii::$app->request->post())) {
                $author->save();
            }
        }

        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

        $newauthor = new Authors();

        return $this->renderAjax('forms/update/authorsform', [
            'id' => $id,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * @param integer $author_id
     * @param integer $article_id
     * @return string
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDeleteauthor($author_id, $article_id)
    {
        $deleting_author = Authors::findOne(['id' => $author_id]);
        $deleting_author->delete();

        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $article_id])
        ]);

        $newauthor = new Authors();

        return $this->renderAjax('forms/update/authorsform', [
            'id' => $article_id,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
        ]);
    } // end action

    /******************************************************************************************************************/



    /**
     * Creates new Association (Articles/journals/Association model) for current article using article's id parameter;
     * Association model values loading from POST;
     *
     * @param $id - article id;
     * @return string
     */
    public function actionAssociation($id)
    {
        $associations = new Associations();
        if ($associations->load(Yii::$app->request->post())) {
            if (!$associations->save()) {
                Yii::$app->session->setFlash('danger', 'Добавление организации не удалось');
            }
        }

        $associations = new ActiveDataProvider([
            'query' => Associations::find()->where(['article_id' => $id])
        ]);

        return $this->renderAjax('forms/update/associations', [
            'associations' => $associations,
            'id' => $id
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Deletes association (article/journals/Associations model) from current article;
     *
     * @param $id - current article's id;
     *
     * @return false|int
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDeleteassociation($id)
    {
        $model = Associations::find()->where(['id' => $id ])->one();
        if ($model != null) {
            $model->delete();
        }

        $associations = new ActiveDataProvider([
            'query' => Associations::find()
        ]);

        return $this->renderAjax('forms/update/associations', [
            'associations' => $associations,
            'id' => $id
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Adds new citation (articles/journals/Citation model record) to current article;
     *
     * @param $id - article id;
     * @return string
     */
    public function actionCitation($id)
    {
        // saving citation
        $citation = new Citations();

        if (Yii::$app->request->post() && $citation->load(Yii::$app->request->post())) {
            $citation->save();
        }

        // citation class for active form
        $newcitation = new Citations();

        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['article_id' => $id])
        ]);

        // data for dropdown list
        $citation_classes = ArrayHelper::map(
            CitationClasses::find()->asArray()->all(),
            'class',
            'class'
        );

        // current article model
        $model = ArticleJournal::find()
            ->where(['id' => $id])
            ->one();

        return $this->renderAjax('forms/update/citationsform', [
            'model' => $model,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation,
            'id' => $id
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Deletes citation model linked to current article model using model's id and citation id;
     *
     * @param $id
     * @param $citation
     * @return string
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeletecitation($id, $citation)
    {

        $citation_to_delete = Citations::findOne(['id' => $citation]);
        $citation_to_delete->delete();

        // citation class for active form
        $newcitation = new Citations();

        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['article_id' => $id])
        ]);

        // data for dropdown list
        $citation_classes = ArrayHelper::map(
            CitationClasses::find()->asArray()->all(),
            'class',
            'class'
        );

        // current article model
        $model = ArticleJournal::find()
            ->where(['id' => $id])
            ->one();

        return $this->renderAjax('forms/update/citationsform', [
            'model' => $model,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation,
            'id' => $id
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * End AJAX
     */



    /**
     * Deletes an existing Articles model;
     * If deletion successful, will redirect to 'index' page;
     *
     * @param int $id
     * @return yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    } // end action

    /******************************************************************************************************************/


    /**
     * Finds the Articles model based on its primary key value
     * If the model is not found, a 404 HTTP exception will be thrown
     *
     * @param integer $id
     * @return ArticleJournal|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = ArticleJournal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    } // end action

} // end class