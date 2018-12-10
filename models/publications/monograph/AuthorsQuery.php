<?php

namespace app\models\publications\monograph;

use yii\db\ActiveQuery;

/**
 * Class AuthorsQuery
 * @package app\models\units\monograph
 */
class AuthorsQuery extends ActiveQuery
{

    public function one($db = null)
    {
        return parent::one($db);
    } // end function

    public function all($db = null)
    {
        return parent::all($db);
    } // end function

} // end class
