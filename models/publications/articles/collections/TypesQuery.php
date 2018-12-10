<?php

namespace app\models\publications\articles\collections;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for ArticleTypes;
 *
 * @see ArticleTypes
 */
class TypesQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Types[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return Types|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
