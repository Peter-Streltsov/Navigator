<?php

namespace app\models\identity;

/**
 * ActiveQuery class for [[Personnel]]
 *
 * @see Personnel
 */
class PersonnelQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return Personnel[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Personnel|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
