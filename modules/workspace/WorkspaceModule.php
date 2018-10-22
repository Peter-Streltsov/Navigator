<?php

namespace app\modules\workspace;

use yii\base\Module;
use yii\helpers\Url;

/**
 * Workspace module definition class
 */
class WorkspaceModule extends Module
{

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\workspace\controllers';

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
