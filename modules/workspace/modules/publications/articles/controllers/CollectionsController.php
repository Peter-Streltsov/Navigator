<?php

namespace app\modules\workspace\modules\publications\articles\controllers;

// project classes
use app\interfaces\PublicationControllerInterface;
use app\models\publications\articles\collections\ArticleCollection;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\publications\articles\collections\Authors;
use app\models\publications\articles\collections\Citations;
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
        $magazines = ArrayHelper::map(Magazines::find()->asArray()->all(), 'magazine', 'magazine');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/workspace/units/articles/collections/update', 'id' => $model->id]);
        }

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'magazines' => $magazines,
            'languages' => $languages
        ]);
    } // end action


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

        $newcitation = new Citations();
        $newauthor = new Authors();

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
            'model' => $model,
        ]);

    } // end action


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
