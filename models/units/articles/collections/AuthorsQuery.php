<?php

namespace app\models\units\articles\collections;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticlesAuthors]].
 *
 * @see ArticlesAuthors
 */
class AuthorsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return ArticlesAuthors[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return ArticlesAuthors|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
