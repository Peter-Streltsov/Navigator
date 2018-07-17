<?php

namespace app\models\units\articles\conferencies;

use yii\db\ActiveQuery;

/**
 * ActiveQuery class for [[Article]]
 *
 * @see ArticlesConferencies
 */
class ArticleQuery extends ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
