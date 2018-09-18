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
    public $label;

    public function __construct()
    {

        $organisation = Organisation::findOne(1);

        if ($organisation != null) {
            $this->label = $organisation->organisation;
            $this->orgdata = $organisation;
        } else {
            $this->orgdata = new \stdClass();
            $this->orgdata->organisation = '';
            $this->orgdata->weblink = '';
            $this->label = '';
        }

    } // end construct



    public function __set($name, $value)
    {

        $this->$name = $value;

    } // end function

} // end function
