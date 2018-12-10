<?php

namespace app\models\publications\articles\journals;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for app\models\units\articles\journals\Pages;
 *
 * @see Pages
 */
class PagesQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     *
     * @return Pages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     *
     * @return Pages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
