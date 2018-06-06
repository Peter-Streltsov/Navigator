<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Authors;
use app\modules\Control\models\Fileupload;
use app\modules\Control\models\UploadCategories;
use Yii;
use app\modules\Control\models\Upload;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UploadController implements the CREATE/READ and DELETE actions for Upload model.
 */
class UploadController extends Controller
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
     * Lists all Upload models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Upload::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    } // end action



    /**
     * Displays a single Upload model.
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
     *
     * Creates a new Upload model.
     * Creates a new Fileuploaded model,
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * TODO: delete action; moved to PersonalController
     *
     * @deprecated
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Upload();

        if (isset($_POST['upload_flag'])) {

            $file = new Fileupload();
            $file->uploadedfile = UploadedFile::getInstance($file, 'uploadedfile');
            $file->upload();
            $model->uploadedfile = (string)$file->name;
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect('view?id=' . $model->id);

            /*if ($model->load(Yii::$app->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }*/

        }

        $user = Yii::$app->user->getIdentity();
        $author = Authors::find()->where(['user_id' => $user->id])->one();
        $classes = UploadCategories::find()->asArray()->all();
        $classes = ArrayHelper::map($classes, 'id', 'class');
        $file = new Fileupload();

        return $this->render('create', [
            'model' => $model,
            'classes' => $classes,
            'user' => $user,
            'author' => $author,
            'file' => $file,
        ]);

    } // end action



    /**
     * Updates an existing Upload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
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
     * Deletes an existing Upload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Upload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Upload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Upload::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
