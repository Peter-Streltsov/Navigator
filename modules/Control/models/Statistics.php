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

        $authors = (Authors::find()->count());

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
        $phd = [];
        $dsc = [];

        $personnel = Personnel::find()->asArray()->all();

        foreach ($personnel as $staff) {
            if ($staff['habilitation'] == 'кандидат наук') {
                $phd[] = $staff;
            } elseif ($staff['habilitation'] == 'доктор наук') {
                $dsc[] = $staff;
            }
        }

        foreach ($phd as $author) {

        }

        foreach ($phd as $author) {

        }

        //return $personnel;
        return $phd;
        //return $dsc;
        //return $authors;
        //return $advanced;

    } // end function



    /**
     * @return array
     */
    public function indexTimeline()
    {

        $timeline = [];

        $years[] = date('Y');

        for ($i = 1; $i < 10; $i++) {
            $years[$i] = $years[$i - 1] - 1;
        }

        foreach ($years as $year) {
            $timeline[$year] = Articles::getIndexesByYear($year);
        }

        return $timeline;

    } // end function

} // end class
