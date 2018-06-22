<?php

namespace app\components;

use app\models\basis\Organisation;
use yii\base\Component;

/**
* Class Access
* @package app\components
*/
class Data extends Component
{

    public $orgdata;

    public function __construct()
    {

        $organisation = new Organisation();
        $organisation::findOne(1);

        $this->orgdata = $organisation;

    } // end construct

} // end function
