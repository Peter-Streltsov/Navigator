<?php

namespace app\modules\Control\controllers;

// project classes
use app\models\pnrd\CommonData;
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

        $testdata = [
            'total' => $commondata::total()
        ];

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
            'test' => $testdata,
            'science' => $sciencedata,
            'employee' => $employeedata,
        ]);

    } // end action

} // end class
