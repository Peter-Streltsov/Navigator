<?php

namespace app\models\units\dissertations;

/**
 * ActiveQuery class for [[DissertationTypes]];
 *
 * @see DissertationTypes
 */
class DissertationTypesQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return DissertationTypes[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return DissertationTypes|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
