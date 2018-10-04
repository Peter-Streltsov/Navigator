<?php

namespace app\modules\Control\modules\Admin\controllers;

// project classes
use app\models\common\Languages;
// yii classes
use app\models\common\Magazines;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Class LanguagesController
 *
 * @package app\modules\Control\modules\Admin\controllers
 */
class DataController extends Controller
{

    public function actionIndex()
    {

        $languages = new ActiveDataProvider([
            'query' => Languages::find()
        ]);

        $magazines = new ActiveDataProvider([
            'query' => Magazines::find()
        ]);

        return $this->render('index', [
            'languages' => $languages,
            'magazines' => $magazines
        ]);

    } // end action

} // end class
