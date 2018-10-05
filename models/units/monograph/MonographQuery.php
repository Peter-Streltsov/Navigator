<?php

namespace app\models\units\monograph;

/**
 * This is the ActiveQuery class for [[Monograph]]
 *
 * @see Monograph
 */
class MonographQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return Monograph[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function

    /**
     * @inheritdoc
     * @return Monograph|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
