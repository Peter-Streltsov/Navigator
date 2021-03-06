<?php

namespace app\models\publications\articles\collections;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for ArticlesAuthors;
 *
 * @see ArticlesAuthors
 */
class AuthorsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Authors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Authors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
