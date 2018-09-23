<?php

namespace app\models\units\articles\collections;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Affilations]].
 *
 * @see Affilations
 */
class AffilationsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Affilations[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Affilations|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
