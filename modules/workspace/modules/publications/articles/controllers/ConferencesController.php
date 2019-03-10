<?php

namespace app\modules\workspace\modules\publications\articles\controllers;

// project classes
use app\interfaces\PublicationControllerInterface;
use app\models\filesystem\Fileupload;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
use app\models\publications\articles\conferences\ArticleConference;
use app\models\publications\articles\conferences\Citations;
use app\models\publications\CitationClasses;
use app\models\publications\articles\conferences\Associations;
use app\models\publications\articles\conferences\Authors;
use app\models\identity\Authors as AuthorsCommon;
// yii2 classes
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ConferencesController implements the CRUD actions for ArticleConference model
 */
class ConferencesController extends Controller implements PublicationControllerInterface
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
     * Lists all ArticleConference models
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ArticleConference::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    } // end action


    /**
     * Displays a single ArticleConference model
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
     * Creates a new ArticleConference model
     * If creation successful, will redirect to 'view' page
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
        $model = new ArticleConference();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        // magazines list
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');
        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();
        $classes = ArrayHelper::map($classes, 'id', 'description');
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

        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);
    } // end action


    /**
     * Creates a new ArticleConference model
     * If creation successful, will redirect to 'view' page
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
        $model = new ArticleConference();
        // added languages list
        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');
        // magazines list
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');
        // article categories (pnrd)
        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();
        $classes = ArrayHelper::map($classes, 'id', 'description');
        // pnrd indexes
        $types = $model->availableTypes;

        /**
         * saving base model or collecting errors (converting to string) if not succeeded
         */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workspace/publications/articles/conferences/update', 'id' => $model->id]);
        } elseif (Yii::$app->request->post() && !$model->save()) {
            foreach ($model->getErrors() as $error) {
                $message[] = implode(' ', $error);
            }
            $errors = implode('<br>', $message);
            Yii::$app->session->setFlash('danger', 'Сохранение не удалось' . '<br><br>' . $errors);
        }

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);
    } // end action


    /**
     * Updates an existing ArticleConference model;
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
         * checking user access rights (else - redirect to Workspace module index page);
         */
        if (!Yii::$app->access->isAdmin()) {
            return $this->redirect('/workspace');
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * creating new models (magazines, citations, authors);
         * @var Magazines $newmagazine
         * @var Citations $newcitation
         * @var Authors $newauthor
         */
        $newmagazine = new Magazines();
        $newcitation = new Citations();
        $newauthor = new Authors();

        //------------------------------------------------------------------------------------------------------------//

        /**
         * collecting article authors;
         * @var ActiveDataProvider
         */
        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * transfering $authors into array via ArrayHelper::map();
         * @var array $author_items
         */
        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        //------------------------------------------------------------------------------------------------------------//

        /**
         * collecting citations for current article;
         * @var ActiveDataProvider $citations
         */
        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//

        /**
         * associations for current article;
         */
        $associations = new ActiveDataProvider([
            'query' => Associations::find()->where(['article_id' => $id])
        ]);

        //------------------------------------------------------------------------------------------------------------//


        $citation_classes = ArrayHelper::map(CitationClasses::find()->asArray()->all(),'class','class');

        $classes = IndexesArticles::find()->select(['id', 'description'])->asArray()->all();

        $languages = ArrayHelper::map(Languages::find()->asArray()->all(), 'language', 'language');

        $file = new Fileupload();

        //------------------------------------------------------------------------------------------------------------//

        /**
         *
         */
        $model = $this->findModel($id);

        //------------------------------------------------------------------------------------------------------------//

        // updating article data - articleform
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $newmagazine->magazine = $model->magazine;
                $newmagazine->save();
            }
        }

        //------------------------------------------------------------------------------------------------------------//

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        //------------------------------------------------------------------------------------------------------------//

        /**
         * rendering view;
         */
        return $this->render('update', [
            'model' => $model,
            'id' => $id,
            'classes' => $classes,
            'linked_authors' => $linked_authors,
            'languages' => $languages,
            'author_items' => $author_items,
            'newcitation' => $newcitation,
            'newauthor' => $newauthor,
            'citations' => $citations,
            'associations' => $associations,
            'citation_classes' => $citation_classes,
            'file' => $file
        ]);

    } // end action


    /**
     * @param $id
     * @return string
     */
    public function actionAuthor($id)
    {
        $author = new Authors();
        $newauthor = new Authors();
        $error = null;

        if (Yii::$app->request->post() && $author->load(Yii::$app->request->post())) {
            if (!$author->save()) {
                $error = $author->getErrors();
            }
        }

        $author_items = ArrayHelper::map(AuthorsCommon::find()->asArray()->all(), 'id', function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

        return $this->renderAjax('forms/update/authorsform', [
            'id' => $id,
            'error' => $error,
            'linked_authors' => $linked_authors,
            'author_items' => $author_items,
            'newauthor' => $newauthor,
        ]);
    } // end action


    /**
     * deletes existing author from junction model
     *
     * @param $author_id
     * @param $id
     * @return string
     * @throws \Throwable
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteauthor($author_id, $id)
    {
        if (!Yii::$app->access->isAdmin()) {
            return $this->redirect('/workspace/articles/conferences/view?id=' . $id);
        }
        //$deleting_author = Authors::findOne(['id' => $author_id]);
        $deleting_author = Authors::find()->where(['id' => $author_id])->one();
        $deleting_author->delete();
        $newauthor = new Authors();
        $author_items = ArrayHelper::map(
            AuthorsCommon::find()->select(['id', 'name', 'lastname'])->asArray()->all(), 'id',
            function ($item) {
                return $item['name'] . ' ' . $item['lastname'];
            });

        $linked_authors = new ActiveDataProvider([
            'query' => Authors::find()->where(['article_id' => $id])
        ]);

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
     * Deletes an existing ArticleConference model
     * If deletion successful, will redirect to 'index' page
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->access->isSupervisor()) {
            return $this->redirect('/workspace');
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    } // end action


    /**
     * Finds the ArticleConference model based on its primary key value
     * If the model is not found, a 404 HTTP exception will be thrown
     *
     * @param $id
     * @return ArticleConference|null
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    protected function findModel($id)
    {
        if (($model = ArticleConference::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрошенный ресурс не существует');
    } // end function

} // end class
