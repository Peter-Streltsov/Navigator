<?php

namespace app\models\publications;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for CitationClasses;
 *
 * @see CitationClasses
 */
class CitationClassesQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return CitationClasses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return CitationClasses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
