<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[MonographiesCitations]].
 *
 * @see MonographiesCitations
 */
class MonographiesCitationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MonographiesCitations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MonographiesCitations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
