<?php

namespace app\models\identity;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for [[Roles]];
 *
 * @see Roles
 */
class RolesQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Roles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Roles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
