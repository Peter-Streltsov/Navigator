<?php

namespace app\modules\Control\modules\Admin;

use app\modules\Control\modules\Admin\controllers\ErrorController;
use Codeception\Module\Yii2;
use yii\web\ErrorHandler;

/**
 * admin module definition class
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\Control\modules\Admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //\Yii::configure($this, []);

    } // end function



    public function beforeAction($action)
    {

        if(!\Yii::$app->access->isAdmin()) {
            return \Yii::$app->getResponse()->redirect('/control?denyrequest=1');
        }

        return true;

    } // end function

} // end class
