<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[MonographAffilations]].
 *
 * @see MonographAffilations
 */
class MonographAffilationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MonographAffilations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MonographAffilations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
