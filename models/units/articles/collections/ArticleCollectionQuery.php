<?php

namespace app\models\units\articles\collections;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for [[ArticleCollection]].
 *
 * @see ArticleCollection
 */
class ArticleCollectionQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return ArticleCollection[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return ArticleCollection|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
