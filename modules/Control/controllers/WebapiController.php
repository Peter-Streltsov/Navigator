<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Authors;
use RenanBr\CrossRefClient;
use yii\web\Controller;
use Scopus\ScopusApi;

/**
 * Class WebapiController
 *
 * @package app\modules\Control\controllers
 */
class WebapiController extends Controller
{


    /**
     * @return string
     */
    public function actionScopusapi()
    {

        //$authors = Authors::find()->all();
        $authors[] = ['name' => '', 'lastname' => ''];

        $apiKey = "0a8b65c432d01c4ddeeac0e57b5b4b1f";
        $api = new ScopusApi($apiKey);

        $results = $api
            ->query("af-id(60071066)")
            ->start(0)
            ->count(5)
            ->viewComplete()
            ->search();

        var_dump($results);

        return $this->render('scopusindex', [
            'author' => $authors
        ]);

    } // end action



    /**
     *
     */
    public function actionCrossref()
    {

        $article = null;

        if (\Yii::$app->request->post() && $_POST['DOI'] != null) {
            $client = new CrossRefClient();
            $article = $client->request('works/' . $_POST['DOI']);
            if ($article['status'] == 'ok') {

            }
            return $this->render('crossref', [
                'article' => $article
            ]);
        } else {
            return $this->render('crossref', [
                'article' => $article
            ]);
        }

    } // end action



    /**
     *
     */
    public function actionCrossrefajax()
    {

    }

} // end class
