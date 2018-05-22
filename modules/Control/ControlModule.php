<?php

namespace app\modules\Control;

use yii\helpers\Url;

/**
 * Control module definition class
 */
class ControlModule extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\Control\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->layout = 'control';

    } // end function



    public function beforeAction($action)
    {

        if(!\Yii::$app->access->isAdmin()) {
            \Yii::$app->getResponse()->redirect(Url::to('/site/index?denyrequest=1'));
            return false;
        }

        return true;

    } // end function

} // end module
