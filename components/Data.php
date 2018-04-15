<?php

namespace app\components;

use app\modules\Control\models\Organisation;
use yii\base\Component;

/**
* Class Access
* @package app\components
*/
class Data extends Component
{

    public $data;

    public function __construct()
    {

        $this->data = Organisation::find()->one();

    } // end construct

} // end function
