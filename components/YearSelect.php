<?php

namespace app\components;

use yii\base\Component;

class YearSelect extends Component
{

    public $select;

    public function __construct()
    {

        $currentdate = date('Y');
        $begindate = $currentdate - 30;
        $enddate = $currentdate + 1;
        $this->select = range($begindate, $enddate);

    } // end construct

} // end class
