<?php

namespace app\models\units\articles\conferencies;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticleTypes]].
 *
 * @see ArticleTypes
 */
class ArticleTypesQuery extends ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesConferenciesTypes[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return ArticlesConferenciesTypes|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
