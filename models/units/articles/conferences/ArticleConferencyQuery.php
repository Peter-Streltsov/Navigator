<?php

namespace app\models\units\articles\conferences;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for [[Article]]
 *
 * @see ArticlesConferencies
 */
class ArticleConferencyQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Article[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Article|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
