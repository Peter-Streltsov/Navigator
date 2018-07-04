<?php

namespace app\models\identity;

/**
 * This is the ActiveQuery class for [[Accesstokens]].
 *
 * @see Accesstokens
 */
class AccesstokensQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Accesstokens[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Accesstokens|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
