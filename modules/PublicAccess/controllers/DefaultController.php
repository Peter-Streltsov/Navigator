<?php

namespace app\modules\PublicAccess\controllers;

// project classes
use app\models\opendata\Data;
// yii classes
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `PublicAccess` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * Displays public accessible data on institution publications
     *
     * @return string
     */
    public function actionIndex()
    {

        //displaying flash message if redirected from restricted resource
        if (isset($_GET['denyrequest'])) {
            \Yii::$app->session->setFlash('danger', 'Доступ к запрашиваемому ресурсу невозможен');
        }

        // collecting articles
        $articles = Data::getArticles();
        $monograph = [];
        $dissertations = [];

        // gathering publications
        $publications = array_merge($articles, $monograph, $dissertations);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $publications
        ]);

        return $this->render('index', [
            'dataprovider' => $dataProvider
        ]);

    } // end action



    /**
     *
     */
    public function actionInfo()
    {

    } // end action



    /**
     *
     */
    public function actionStatistics()
    {

    } // end action

} // end class
