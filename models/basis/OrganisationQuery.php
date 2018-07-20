<?php

namespace app\models\basis;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Organisation]].
 *
 * @see Organisation
 */
class OrganisationQuery extends ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/



    /**
     * @inheritdoc
     * @return Organisation[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Organisation|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
