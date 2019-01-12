<?php

namespace app\models\publications\monograph;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for Citations;
 *
 * @see MonographiesCitations
 */
class CitationsQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Citations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Citations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
