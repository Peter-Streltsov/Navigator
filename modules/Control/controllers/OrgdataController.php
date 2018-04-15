<?php

namespace app\modules\Control\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Monographies;
use app\modules\Control\models\Organisation;
use app\modules\Control\models\Personnel;
use app\modules\Control\models\Users;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\web\Controller;


/**
 * Default controller for the `Control` module
 */
class OrgdataController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $model = Organisation::find()->one();

        //echo "orgdata";
        return $this->render('index', [
            'model' => $model
        ]);

    } // end action

} // end class