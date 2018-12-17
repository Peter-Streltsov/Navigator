<?php

namespace app\models\publications;

// project classes
use app\interfaces\PublicationQueryInterface;
// yii classes
use yii\db\ActiveQuery;

/**
 * Class PublicationQuery;
 * Basic ActiveQuery class for publication models; provides fluent interface
 * methods for publications ActiveQuery classes;
 * All other ActiveQuery classes for publication models MUST extend this class
 *
 * @package app\models\publications
 */
class PublicationQuery extends ActiveQuery implements PublicationQueryInterface
{

    /**
     * adds query parameter - int $year
     *
     * @param int $year
     * @return $this
     */
    public function byYear($year)
    {
        return $this->andWhere(['year' => $year]);
    } // end function


    /**
     * adds query parameter - 'year' == current year
     */
    public function currentYear()
    {
        return $this->andWhere(['year' => date('Y')]);
    } // end function

} // end class