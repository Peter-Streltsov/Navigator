<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\Authors;
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

        $data['users'] = Users::find()->count();
        $data['authors.php'] = Authors::find()->count();
        $data['articles'] = Articles::find()->count();

        return $this->render('index', [
            'data' => $data
        ]);
    }
}
