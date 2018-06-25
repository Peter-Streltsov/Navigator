<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[Articles]].
 *
 * @see Articles
 */
class ArticlesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/



    /**
     * @inheritdoc
     * @return Articles[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Articles|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
