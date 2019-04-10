<?php

namespace app\modules\workspace\modules\publications\controllers;

/** project classes */
use app\interfaces\PublicationControllerInterface;
use app\models\common\Cities;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\filesystem\Fileupload;
use app\models\identity\Authors as AuthorsCommon;
//use app\modules\Control\models\Fileupload;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\publications\monograph\Associations;
use app\models\publications\monograph\Monograph;
use app\models\publications\monograph\Authors;
use app\models\publications\monograph\Citations;
use app\models\publications\CitationClasses;
/** yii classes */
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MonographController implements the CRUD actions for Monograph;
 */
class MonographController extends Controller implements PublicationControllerInterface
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
     * Lists all Monographs models;
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Monograph::find()
                //->joinWith('authors')
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } // end action


    /**
     * Displays a single Monograph model;
     *
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
     * Creates a new Monograph model;
     * If request method is AJAX - renders form for a new Monograph model (via renderAjax from ajaxforms directory;
     * If request method is GET - renders form for a new Monograph model (from forms directory);
     * If request method is POST - tries to load and save model;
     * If creation successful, will be redirect to 'view' page;
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Monograph();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $cities = Cities::find()->all();
        $magazines = Magazines::find()->all();

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('', [
                'model' => $model,
                'magazines' => $magazines,
                'cities' => $cities
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'magazines' => $magazines,
                'cities' => $cities
            ]);
        }
    } // end action


    /**
     * If request method is AJAX - renders form for a new Monograph model;
     * If request method is POST - tries to load and save model;
     * If creation successful, will be redirect to 'view' page;
     *
     * @deprecated (still in use, to be replaced with monograph/create route)
     * @return string|\yii\web\Response
     */
    public function actionCreateAjax()
    {
        $model = new Monograph();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $cities = Cities::find()->all();
        $magazines = Magazines::find()->all();

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'cities' => $cities,
            'magazines' => $magazines
        ]);
    } // end action


    /**
     * Updates an existing Monograph model;
     * If update successful, will be redirect to 'view' page;
     * TODO: rework uploading files (do not use from articles/journals controller; leave empty);
     *
     * @param int $id
     * @return mixed|string|yii\web\Response
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionUpdate($id)
    {
        //------------------------------------------------------------------------------------------------------------//

        /**
         * checking user access rights;
         * if not allowed - redirect to Workspace module index page;
         */
        if (!Yii::$app->access->isAdmin()) {
            return $this->redirect('/workspace');
        }

        /**
         * preparing new models to save linked data;
         *
         * @var Citations $newCitation
         * @var Associations $newAssociation
         * @var Authors $newAuthor
         */
        $newCitation = new Citations();
        $newAssociation = new Associations();
        $newAuthor = new Authors();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * associations
         */
        if (Yii::$app->request->post() && isset($_POST['affilation_flag'])) {
            $association = Associations::find()->where(['monograph_id' => $id])->one();
            if ($association == null) {
                $association = new Associations();
            }
            $association->monograph_id = $id;
            // saving association model and adding flash messages
            if ($association->load(Yii::$app->request->post()) && $association->save()) {
                Yii::$app->session->setFlash('success', 'Данные обновлены');
            } else {
                $association_errors = $association->getErrorsMessage();
                Yii::$app->session->setFlash('danger', $association_errors);
            }
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * citations - saving or getting error message;
         */
        if (Yii::$app->request->post() && isset($_POST['citation_flag'])) {
            $citation = new Citations();
            if ($citation->load(Yii::$app->request->post()) && $citation->save()) {
                return $this->redirect(['update', 'id' => $id]);
            } else {
                $error_message = $citation->getErrorsMessage();
                Yii::$app->session->setFlash('danger', $error_message);
            }
        }

        //------------------------------------------------------------------------------------------------------------//

        $file = new Fileupload();

        //------------------------------------------------------------------------------------------------------------//

        // uploading monograph file
        /*if (Yii::$app->request->post() && isset($_POST['upload_flag'])) {
            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');
            $file->upload('monographies/');
            $monographymodel = Monographies::find()->where(['id' => $id])->one();
            $monographymodel->file = $file->name;
            $monographymodel->save();
            Yii::$app->session->setFlash('info',
                'Монографии '
                . $monographymodel->title
                . ' сопоставлен файл '
                . $file->name);
        }*/

        //------------------------------------------------------------------------------------------------------------//

        /**
         * deleting author;
         */
        if (Yii::$app->request->post()) {

            if (isset($_POST['delete']) && $_POST['delete'] == 1) {
                $author_delete = Authors::find()->where([
                    'author_id' => $_POST['author'],
                    'monography_id' => $id
                ])->one();
                $author_delete->delete();
                Yii::$app->session->setFlash('danger', "Автор удален");
            }

            if (isset($_POST['Monographies']['authors'])) {
                $newauthor = new Authors();
                $newauthor->monography_id = $id;
                $newauthor->author_id = $_POST['Monographies']['authors'];
                $newauthor->save();
                Yii::$app->session->setFlash('info', "Автор добавлен");
            }

        }

        //------------------------------------------------------------------------------------------------------------//

        $modelAuthors = new ActiveDataProvider([
            'query' => Authors::find()->where(['monograph_key' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * listed authors (from app\identity\Authors model);
         */
        $authors = AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * listed authors in associate array (via ArrayHelper::map());
         */
        $items = \yii\helpers\ArrayHelper::map($authors, 'id', function($items) {
            return $items['name']. ' ' . $items['lastname'];
        });

        //------------------------------------------------------------------------------------------------------------//

        /**
         * publication classes - from articles module - classes for monographs not specified;
         */
        $classes = IndexesArticles::find()->asArray()->all();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * monograph model
         */
        $model = Monograph::find()->where(['id' => $id])->one();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * citations linked to current monograph;
         */
        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['monograph_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * getting citation classes (associate array);
         * converting citation classes in associate array;
         */
        $citation_classes = CitationClasses::find()->asArray()->all();
        $citation_classes = ArrayHelper::map($citation_classes, 'class', 'class');

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $associations = new ActiveDataProvider([
            'query' => Citations::find()->where(['monograph_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * saving main model (if method is post and properties loaded successfully);
         */
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        //------------------------------------------------------------------------------------------------------------//

        $languages = Languages::find()->asArray()->all();
        $languages = ArrayHelper::map($languages, 'language', 'language');

        //------------------------------------------------------------------------------------------------------------//

        /**
         * rendering view (for all methods);
         */
        return $this->render('update', [
            'id' => $id,
            'model' => $model,
            'modelAuthors' => $modelAuthors,
            'associations' => $associations,
            'file' => $file,
            'languages' => $languages,
            'classes' => $classes,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newCitation,
            'author' => $newAuthor,
            'newAssociation' => $newAssociation,
            'authors' => $authors,
            'author_items' => $items
        ]);

    } // end action


    /**
     * Adds new linked author to a monograph;
     *
     * @param integer $id
     * @return string
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

        return $this->renderAjax('forms/update/authors_form', [
            'id' => $id,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
        ]);
    } // end action


    /**
     * Deleting associated with monograph author record (models\monograph\Authors);
     *
     * @param integer $author_id
     * @param integer $id
     * @return string
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteauthor($author_id, $id)
    {
        $deleting_author = Authors::findOne(['id' => $author_id]);
        $deleting_author->delete();

        $author = new AuthorsCommon();

        $authors = new ActiveDataProvider([
            'query' => AuthorsCommon::find()
        ]);

        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

        $newauthor = new Authors();

        return $this->renderAjax('forms/update/authors_form', [
            'id' => $id,
            'author' => $author,
            'authors' => $authors,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
        ]);
    } // end function


    /**
     * @param $id
     * @return mixed|void
     */
    public function actionCitation($id)
    {
        // TODO: Implement actionCitation() method.
    } // end action


    /**
     * @param int $id
     * @param int $citation
     * @return mixed|void
     */
    public function actionDeletecitation($id, $citation)
    {
        // TODO: Implement actionDeletecitation() method.
    }


    /**
     * Deletes an existing Monograph model;
     * If deletion successful, will redirect to 'index' page;
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        /**
         * checking user access rights (must be 'supervisor');
         * if not allowed - redirect to 'index' page;
         */
        if (Yii::$app->access->isSupervisor()) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('danger', 'Операция не разрешена для текущих прав пользователя');
            $this->redirect('/workspace');
        }
        return null;
    } // end action


    /**
     * @param $id
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionAssociation($id)
    {
        $associations = new Associations();
        if ($associations->load(Yii::$app->request->post())) {
            if (!$associations->save()) {
                //$message = $associations->getErrorsMessage();
                Yii::$app->session->setFlash('danger', 'Добавление организации не удалось');
            }
        }

        $associations = new ActiveDataProvider([
            'query' => Associations::find()->where(['monograph_id' => $id])
        ]);

        $newAssociation = new Associations();

        return $this->renderAjax('forms/update/associations_form', [
            'newAssociation' => $newAssociation,
            'associations' => $associations,
            'id' => $id
        ]);
    } // end action


    /**
     * @param $id
     * @return false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
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


    /**
     * Finds the Monograph model based on its primary key value;
     * If the model is not found, a 404 HTTP exception will be thrown;
     *
     * @param integer $id
     * @return Monograph the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Monograph::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    } // end function

} // end class
