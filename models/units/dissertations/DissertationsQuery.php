<?php

namespace app\models\units\dissertations;

/**
 * ActiveQuery class for [[Dissertations]]
 *
 * @see Dissertations
 */
class DissertationsQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return Dissertations[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Dissertations|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
