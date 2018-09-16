<?php

namespace app\models\units\articles\journals;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticleTypes]].
 *
 * @see Types
 */
class TypesQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/


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
