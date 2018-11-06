<?php

namespace app\modules\workspace\modules\personal;

use yii\base\Module;

/**
 * personal module definition class
 *
 */
class PersonalModule extends Module
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->controllerNamespace = 'app\modules\workspace\modules\personal\controllers';
    } // end function

} // end class
