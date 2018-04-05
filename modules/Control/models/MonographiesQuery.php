<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[Monographies]].
 *
 * @see Monographies
 */
class MonographiesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Monographies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Monographies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
