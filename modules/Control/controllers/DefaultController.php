<?php

namespace app\modules\Control\controllers;

// project classes
use app\models\pnrd\facades\CommonData;
use app\models\units\articles\ArticleJournal;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Dissertations;
//use app\modules\Control\models\Monographies;
//use app\modules\Control\models\Personnel;
use app\models\identity\Users;
// yii2 classes
use yii\web\Controller;


/**
 * Default controller for the `Control` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $user = \Yii::$app->user->getIdentity();
        $author = Authors::find()->where(['user_id' => $user->id])->one();

        $commondata = new CommonData();

        $data['authors'] = Authors::find()->count();
        $data['articles'] = ArticleJournal::find()->count();
        $data['monographies'] = '';

        $table = [
            'users' => $commondata->users->count(),
            'personnel' => $commondata->employees->count(),
            'phd' => '',
            'authors' => $commondata,
            'publications' => '',
            'monographies' => $data['monographies'],
            'articles' => $commondata->countArticlesJournal(),
            'dissertations' => $commondata->countDissertations()
        ];


        return $this->render('index', [
            'data' => $data,
            'table' => $table,
        ]);

    } // end action

} // end class
