<?php

namespace app\models\publications\monograph;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for Booktypes;
 *
 * @see Booktypes
 */
class BooktypesQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Booktypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Booktypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
