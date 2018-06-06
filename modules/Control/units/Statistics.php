<?php

namespace app\modules\Control\units;

use yii\base\Model;
use app\modules\Control\models\Authors;
use app\modules\Control\models\Articles;
use app\modules\Control\models\Monographies;
use app\modules\Control\models\Personnel;
use app\modules\Control\units\PNRD;
use MathPHP\Statistics\Average;

class Statistics extends Model
{

    /**
     * @return array
     */
    public static function getBasic()
    {

        $authors = (Authors::find()->count());

        $basic = [];

        // средний индекс
        $basic['meanindex'] = \app\modules\Control\units\PNRD::meanIndex();

        // статей на одного автора
        $basic['meanarticles'] = (float)(Articles::find()->count() / $authors);

        $basic['meanarticles2'] = Average::mean([]);

        $basic['meanmonographies'] = round((float)(Monographies::find()->count() / $authors), 2);

        return $basic;

    } // end function



    /**
     * provides advanced statistics data
     *
     * @return array
     */
    public static function getAdvanced()
    {

        $advanced = [];

        // philosophy doctors
        $phd = [];

        // doctors of sciences
        $dsc = [];

        $mns = [];
        $ns = [];
        $sns = [];

        $personnel = Personnel::find()->asArray()->all();

        foreach ($personnel as $staff) {
            if ($staff['habilitation'] == 'кандидат наук') {
                $phd[] = $staff;
            } elseif ($staff['habilitation'] == 'доктор наук') {
                $dsc[] = $staff;
            }
        }

        foreach ($personnel as $staff) {
            if ($staff['position'] == 'младший научный сотрудник') {

            } elseif ($staff['position'] == 'научный сотрудник') {

            } elseif ($staff['position'] == 'ведущий научный сотрудник') {

            }
        }



        foreach ($phd as $author) {

        }

        foreach ($phd as $author) {

        }

        //return $personnel;
        return $advanced;

    } // end function



    /**
     * @return array
     */
    public static function indexTimeline()
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
