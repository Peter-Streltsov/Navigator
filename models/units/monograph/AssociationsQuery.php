<?php

namespace app\models\units\monograph;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MonographAffilations]].
 *
 * @see MonographAffilations
 */
class AssociationsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Associations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Associations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
