<?php

namespace app\modules\workspace\modules\publications\controllers;

/** project classes */
use app\interfaces\PublicationControllerInterface;
use app\models\common\Cities;
use app\models\common\Magazines;
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
     *
     * @param int $id
     * @return mixed|string|\yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionUpdate($id)
    {
        // associations
        if (Yii::$app->request->post() && isset($_POST['affilation_flag'])) {
            $new_association = Associations::find()->where(['monograph_id' => $id])->one();
            if ($new_association == null) {
                $new_association = new Associations();
            }
            $new_association->monograph_id = $id;
            // saving association model and adding flash messages
            if ($new_association->load(Yii::$app->request->post()) && $new_association->save()) {
                Yii::$app->session->setFlash('success', 'Данные обновлены');
            } else {
                Yii::$app->session->setFlash('danger', 'Не удалось обновить данные');
            }
        }

        // citations
        if (Yii::$app->request->post() && isset($_POST['citation_flag'])) {
            $citation = new Citations();
            if ($citation->load(Yii::$app->request->post())) {
                if ($citation->save()) {
                    return $this->redirect(['update', 'id' => $id]);
                } else {
                    ob_start();
                    $errors = $citation->getErrors();
                    foreach ($errors as $key => $error) {
                        $text = '';
                        foreach ($error as $message) {
                            $text = $text . $message . ' ';
                        }
                        echo 'Поле "' . $key . '" => ' . $text;
                    }
                    $cit = ob_get_contents();
                    ob_get_clean();
                    Yii::$app->session->setFlash('danger', $cit);
                }
            }
        }

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

        // deleting author
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

        // view parameters

        // monography authors
        $model_authors = Monograph::find($id)
            ->where(['monographies.id' => $id])
            ->joinWith('data')
            ->all();

        // authors list
        $authors = Authors::find()->select(['id', 'name', 'lastname'])->asArray()->all();

        $items = \yii\helpers\ArrayHelper::map($authors, 'id', function($items) {
            return $items['name']. ' ' . $items['lastname'];
        });

        // uploading file
        $file = new Fileupload();

        $classes = IndexesArticles::find()->asArray()->all();

        $model = Monograph::find($id)
            ->where(['monographies.id' => $id])
            ->joinWith('data')
            ->all();

        $citations = new ActiveDataProvider([
            'query' => Citations::find()->where(['monography_id' => $id])
        ]);
        $citation_classes = CitationClasses::find()->asArray()->all();
        $citation_classes = ArrayHelper::map($citation_classes, 'class', 'class');

        $newcitation = new Citations();

        $affilation = Associations::find()->where(['monograph_id' => $id])->one();

        // saving model data
        if (Yii::$app->request->post()) {
            if ($model[0]->load(Yii::$app->request->post()) && $model[0]->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        return $this->render('update', [
            'model' => $model[0],
            'model_authors' => $model_authors[0],
            'affilation' => $affilation,
            'file' => $file,
            'classes' => $classes,
            'citations' => $citations,
            'citation_classes' => $citation_classes,
            'newcitation' => $newcitation,
            'authors' => $authors,
            'author_items' => $items
        ]);
    } // end action


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
        if (Yii::$app->access->isAdmin()) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        return null;
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
