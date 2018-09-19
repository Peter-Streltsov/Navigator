<?php

namespace app\models\units\articles\journals;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for [[Affilations]]
 *
 * @see ArticlesAffilations
 */
class AffilationsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     *
     * @return Affilations[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     *
     * @return Affilations|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
