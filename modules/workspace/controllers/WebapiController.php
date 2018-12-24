<?php

namespace app\modules\workspace\controllers;

// extensions
use RenanBr\CrossRefClient;
use Scopus\ScopusApi;
// yii classes
use Yii;
use yii\web\Controller;

/**
 * Class WebapiController
 * Provides actions for retrieving data from webapi of scientonmetrics databases (Scopus, CrossRef etc.)
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
     * @return string
     */
    public function actionCrossref()
    {
        $article = null;

        if (Yii::$app->request->post() && $_POST['DOI'] != null) {
            $client = new CrossRefClient();
            $article = $client->request('works/' . $_POST['DOI']);
            if ($article['status'] == 'ok') {

            }
            return $this->render('crossref/crossref', [
                'article' => $article
            ]);
        } else {
            return $this->render('crossref/crossref', [
                'article' => $article
            ]);
        }
    } // end action


    /**
     * @return bool|string
     */
    public function actionCrossrefajax()
    {
        if (\Yii::$app->request->post() && $_POST['DOI'] != null) {
            $client = new CrossRefClient();
            $article = $client->request('works/' . $_POST['DOI']);
            if ($article['status'] == 'ok') {
                $message = $article['message'];
                return $this->renderAjax('crossref/ajax/article', [
                    'article' => $article,
                    'message' => $message
                ]);
            }
        } else {
            return $this->renderAjax('crossref/ajax/error');
        }

        return false;
    } // end action

} // end class
