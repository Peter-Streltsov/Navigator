<?php

namespace app\modules\Control\models;

use yii\base\Model;
use app\modules\Control\models\PNRD;

class Statistics extends Model
{

    /**
     * @return array
     */
    public static function getBasic()
    {

        $authors = (float)(Authors::find()->count());

        $basic = [];
        $basic['meanindex'] = PNRD::meanIndex();
        $basic['meanarticles'] = (float)(Articles::find()->count() / $authors);
        $basic['meanmonographies'] = round((float)(Monographies::find()->count() / $authors), 2);

        return $basic;

    } // end function


    /**
     * @return array
     */
    public static function getAdvanced()
    {

        $advanced = [];

        $advanced['meanindexphd'] = '';

        return $advanced;

    } // end function



    /**
     * @return array
     */
    public function indexTimeline()
    {

        $timeline = [];

        return $timeline;

    } // end function

} // end class
