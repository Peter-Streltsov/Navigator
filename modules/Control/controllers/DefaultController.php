<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\ArticlesAuthors;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Dissertations;
use app\modules\Control\models\Monographies;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\Users;
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

        $data['authors'] = Authors::find()->count();
        $data['articles'] = Articles::find()->count();
        $data['monographies'] = Monographies::find()->count();
        $table = [
            'users' => Users::find()->count(),
            'personnel' => Personnel::find()->count(),
            'phd' => Personnel::find()->where(['habilitation' => 'кандидат наук'])->count(),
            'authors' => Authors::find()->count(),
            'publications' => $data['articles'] + $data['monographies'],
            'monographies' => $data['monographies'],
            'articles' => $data['articles'],
            'dissertations' => Dissertations::find()->count()
        ];


        return $this->render('index', [
            'data' => $data,
            'table' => $table,
        ]);

    } // end action

} // end class
