<?php

namespace app\modules\PublicAccess\modules\controllers;

use app\modules\Control\models\Articles;
use app\modules\Control\models\Monographies;
use \Yii;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Class PublicationsController
 * @package app\modules\PublicAccess\modules\controllers
 */
class PublicationsController extends Controller
{

    /**
     * return data for requested publication
     *
     * @param $type
     * @param $id
     * @return Articles|Monographies|array|null|string
     */
    public function actionView($type, $id)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        switch ($type) {
            case 'article':
                return Articles::find()->select([
                    'title',
                    'subtitle',
                    'year',
                    'doi',
                    'publisher'
                ])->where(['id' => $id])
                    ->asArray()
                    ->one();
            case 'mono':
                return Monographies::find()->where(['id' => $id])->asArray()->one();
            default:
                return 'Unknown publication type';
        }

    } // end action



    /**
     * lists all publication of selected type by year
     *
     * @param $type
     * @param $year
     * @return Articles[]|Monographies[]|array|string
     */
    public function actionAnnum($type, $year)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        switch ($type) {
            case 'article':
                return Articles::find()->select([
                    'title',
                    'subtitle',
                    'publisher',
                    'doi'
                ])->where(['year' => $year])
                    ->asArray()
                    ->all();
            case 'mono':
                return Monographies::find()->select([
                    'title',
                    'subtitle',
                    'isbn',
                    'publisher'
                ])
                    ->where(['year' => $year])
                    ->asArray()
                    ->all();
            default:
                return 'Publication type is not set';
        }

    } // end action

} // end controller
