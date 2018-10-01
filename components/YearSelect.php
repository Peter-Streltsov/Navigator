<?php

namespace app\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;

class YearSelect extends Component
{

    public $select;

    public function __construct()
    {

        $currentdate = date('Y');
        $begindate = $currentdate - 30;
        $enddate = $currentdate + 1;
        $this->select = range($begindate, $enddate);
        $this->select = ArrayHelper::index($this->select, function ($item) {
            return $item;
        });

    } // end construct

} // end class
