<?php

namespace app\modules\Control;

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

        // custom initialization code goes here
    }
}
