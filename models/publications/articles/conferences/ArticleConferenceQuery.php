<?php

namespace app\models\publications\articles\conferences;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for Article;
 *
 * @see ArticlesConferencies
 */
class ArticleConferenceQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return ArticleConference[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    } // end function


    /**
     * @inheritdoc
     * @return ArticleConference|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    } // end function

} // end class
