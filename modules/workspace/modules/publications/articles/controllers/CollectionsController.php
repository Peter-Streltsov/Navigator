<?php

namespace app\modules\workspace\modules\publications\articles\controllers;

// project classes
use app\interfaces\PublicationControllerInterface;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\publications\articles\collections\ArticleCollection;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\publications\articles\collections\Authors;
use app\models\publications\articles\collections\Citations;
use app\models\publications\CitationClasses;
use app\models\identity\Authors as AuthorsCommon;
use app\models\publications\articles\collections\Associations;
//yii2 classes
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CollectionsController implements the CRUD actions for ArticleCollection model;
 */
class CollectionsController extends Controller implements PublicationControllerInterface
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
     * Lists all ArticleCollection models
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ArticleCollection::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } // end action


    /**
     * Displays a single ArticleCollection model
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

    /******************************************************************************************************************/


    /**
     * Creates a new ArticleCollection model
     * If creation successful, will redirect to 'view' page
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreate()
    {
        $model = new ArticleCollection();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
                'languages' => $languages
            ]);
        }

        return $this->render('create', [
            'model' => $model,
            'magazines' => $magazines,
            'languages' => $languages
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Creates a new ArticleCollection model
     * If creation successful, will redirect to 'view' page
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\db\StaleObjectException
     */
    public function actionCreateAjax()
    {
        $model = new ArticleCollection();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        $indexes = ArrayHelper::map(IndexesArticles::find()->asArray()->all(), 'id', 'description');
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workspace/units/articles/collections/update', 'id' => $model->id]);
        }

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'indexes' => $indexes,
            'magazines' => $magazines,
            'languages' => $languages
        ]);
    } // end action

    /******************************************************************************************************************/


    /**
     * Updates an existing ArticleCollection model;
     * If update successful, will redirect to 'view' page;
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

        //------------------------------------------------------------------------------------------------------------//

        /**
         * checking user access rights (must be at least 'administrator');
         */
        if (!Yii::$app->access->isAdmin()) {
            return $this->redirect('/workspace');
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * requesting main model (models\publications\articles\collections\ArticleCollection);
         */
        $model = $this->findModel($id);

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $newmagazine = new Magazines();
        $newcitation = new Citations();
        $newauthor = new Authors();

        //------------------------------------------------------------------------------------------------------------//

        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        //------------------------------------------------------------------------------------------------------------//

        // added citations
        //$citations = $model->citations();
        /**
         *
         */
        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $citation_classes = ArrayHelper::map(
            CitationClasses::find()->asArray()->all(),
            'class',
            'class'
        );

        //------------------------------------------------------------------------------------------------------------//

        // added languages list
        /**
         *
         */
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');

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

        /**
         *
         */
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $associations = new ActiveDataProvider([
            'query' => Associations::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * saving data from POST (if successful - will redirect to 'view' page);
         */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * if request method is get and/or data cannot be saved;
         * rendering view;
         */
        return $this->render('update', [
            'id' => $id,
            'classes' => $classes,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'languages' => $languages,
            'magazines' => $magazines,
            'newmagazine' => $newmagazine,
            'newcitation' => $newcitation,
            'newauthor' => $newauthor,
            'associations' => $associations,
            'model' => $model,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items
        ]);

    } // end action

    /******************************************************************************************************************/


    /**
     * Adds new author (articles/collections/Authors model) to current article;
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
     * @param $author_id
     * @param $id
     * @return string
     * @throws \Throwable
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteauthor($author_id, $id)
    {
        $deleting_author = Authors::findOne(['id' => $author_id]);
        $deleting_author->delete();

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
     * @param $id
     * @return mixed|void
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


    /**
     * @param int $id
     * @param int $citation
     * @return mixed|string
     * @throws \Throwable
     * @throws yii\db\StaleObjectException
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

    /******************************************************************************************************************/


    /**
     * Deletes an existing ArticleCollection model
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

        //------------------------------------------------------------------------------------------------------------//

        /**
         * checking user acess rights (must be 'supervisor');
         */
        if (!Yii::$app->access->isSupervisor()) {
            return $this->redirect('/workspace');
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $this->findModel($id)->delete();

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        return $this->redirect(['index']);

    } // end action

    /******************************************************************************************************************/


    /**
     * Finds the ArticleCollection model based on its primary key value
     * If the model is not found, a 404 HTTP exception will be thrown
     *
     * @param $id
     * @return ArticleCollection|null
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    protected function findModel($id)
    {
        if (($model = ArticleCollection::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрошенный ресурс не существует');
    } // end function

} // end class
