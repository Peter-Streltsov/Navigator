<?php

namespace app\models\publications;

// project classes
use app\interfaces\PublicationQueryInterface;
// yii classes
use yii\db\ActiveQuery;

/**
 * Class PublicationQuery
 *
 * @package app\models\publications
 */
class PublicationQuery extends ActiveQuery implements PublicationQueryInterface
{

    /**
     * @param int $year
     * @return $this
     */
    public function byYear($year)
    {
        return $this->andWhere(['year' => $year]);
    } // end function


    /**
     * ads query parameter - 'year' == current year
     */
    public function currentYear()
    {
        return $this->andWhere(['year' => date('Y')]);
    } // end function

} // end class