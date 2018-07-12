<?php

namespace app\models\units\articles;

use app\models\pnrd\indexes\IndexesArticles;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[IndexesArticles]].
 *
 * @see IndexesArticles
 */
class IndexesArticlesQuery extends ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/



    /**
     * @inheritdoc
     * @return IndexesArticles[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return IndexesArticles|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
