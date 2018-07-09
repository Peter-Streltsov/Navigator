<?php

namespace app\models\units\monograph;

/**
 * This is the ActiveQuery class for [[Booktypes]].
 *
 * @see Booktypes
 */
class BooktypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Booktypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Booktypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
