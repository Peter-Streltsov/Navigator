<?php

namespace app\models\common;

/**
 * This is the ActiveQuery class for [[Magazines]].
 *
 * @see Magazines
 */
class MagazinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Magazines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Magazines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
