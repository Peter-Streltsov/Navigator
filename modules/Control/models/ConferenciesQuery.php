<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[Conferencies]].
 *
 * @see Conferencies
 */
class ConferenciesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Conferencies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Conferencies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
