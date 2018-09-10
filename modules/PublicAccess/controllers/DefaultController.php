<?php

namespace app\modules\PublicAccess\controllers;

use app\models\units\articles\ArticleJournal;
use app\modules\Control\models\Monographies;
use app\modules\PublicAccess\models\PublicModel;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `PublicAccess` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        if (isset($_GET['denyrequest'])) {
            \Yii::$app->session->setFlash('danger', 'Доступ к запрашиваемому ресурсу невозможен');
        }

        $model = (new PublicModel())->getPublications();

        $dataProvider = new ArrayDataProvider([
            'allModels' => $model
        ]);


        //return $this->redirect('/');
        return $this->render('index', [
            'dataprovider' => $dataProvider
        ]);

    } // end action



    public function actionPublications()
    {

        $model = (new PublicModel())->getPublications();

        return $this->redirect('/');

    } // end action



    public function actionInfo()
    {

    } // end action



    public function actionStatistics()
    {

    } // end action

} // end class
