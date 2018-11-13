<?php

namespace app\components;

// project classes
use app\models\basis\Telemetry as TelemetryModel;
// yii classes
use Yii;
use yii\base\Component;

/**
 * Class Telemetry
 *
 * @package app\components
 */
class Telemetry extends Component
{

    /**
     * @var TelemetryModel
     */
    private $model;
    private $errors;

    /**
     * Telemetry constructor
     */
    public function __construct()
    {
        $this->model = new TelemetryModel();
    } // end construct


    /**
     * @return $this
     */
    public function whoami()
    {
        $this->model->user = Yii::$app->user->getIdentity()->getId();
        $this->model->ip = Yii::$app->request->getUserIP();
        $this->model->browser = Yii::$app->request->getUserAgent();
        $this->model->path = Yii::$app->request->pathInfo;
        return $this;
    } // end function


    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    } // end function


    /**
     * @return bool
     */
    public function save()
    {
        if ($this->model->save()) {
            return true;
        } else {
            $this->errors = $this->model->getErrors();
            return false;
        }
    } // end function

} // end class
