<?php

namespace app\modules\Control\modules\personal;

use yii\base\Module;

/**
 * personal module definition class
 */
class PersonalModule extends Module
{
    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->controllerNamespace = 'app\modules\Control\modules\personal\controllers';
        //$this->defaultRoute = 'personal';

    } // end function

} // end class
