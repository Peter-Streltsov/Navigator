<?php

namespace app\modules\workspace\modules\units\articles\controllers;

// project classes
use app\models\units\articles\collections\ArticleCollection;
use app\models\common\Languages;
use app\models\common\Magazines;
//yii2 classes
use Yii;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CollectionsController implements the CRUD actions for ArticleCollection model.
 */
class CollectionsController extends Controller
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
    public function actionAjaxcreate()
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

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'magazines' => $magazines,
            'languages' => $languages
        ]);

    } // end action



    /**
     * Updates an existing ArticleCollection model
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

        $this->findModel($id)->delete();

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

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
