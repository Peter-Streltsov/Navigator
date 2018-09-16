<?php

namespace app\modules\Control\controllers;

// project classes
use app\models\pnrd\facades\CommonData;
use app\models\units\articles\ArticleJournal;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Dissertations;
// yii2 classes
use yii\web\Controller;


/**
 * Default controller for the `Control` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     *
     * @return string
     */
    public function actionIndex()
    {

        $commondata = new CommonData();

        $sciencedata = [
            'publications' => '',
            'monographies' => '',
            'articles' => $commondata->countArticles(),
            'dissertations' => $commondata->countDissertations()
        ];

        $employeedata = [
            'users' => $commondata->users->count(),
            'personnel' => $commondata->employees->count(),
            'phd' => '',
            'authors' => $commondata
        ];


        return $this->render('index', [
            'science' => $sciencedata,
            'employee' => $employeedata,
        ]);

    } // end action

} // end class
