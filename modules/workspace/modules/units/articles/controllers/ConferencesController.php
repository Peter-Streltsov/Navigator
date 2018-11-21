<?php

namespace app\modules\workspace\modules\units\articles\controllers;

// project classes
use app\models\units\articles\conferences\ArticleConference;
use app\models\common\Languages;
use app\models\common\Magazines;
use app\models\pnrd\indexes\IndexesArticles;
// yii2 classes
use Yii;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ConferencesController implements the CRUD actions for ArticleConference model
 */
class ConferencesController extends Controller
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
        $types = $model->types();

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
    public function actionAjaxcreate()
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
        $types = $model->types();

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

        return $this->renderAjax('ajaxforms/create', [
            'model' => $model,
            'languages' => $languages,
            'magazines' => $magazines,
            'types' => $types,
            'classes' => $classes
        ]);

    } // end action



    /**
     * Updates an existing ArticleConference model
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

        throw new NotFoundHttpException('The requested page does not exist.');

    } // end function

} // end class
