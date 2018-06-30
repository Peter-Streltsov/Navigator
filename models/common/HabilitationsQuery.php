<?php

namespace app\models\common;

/**
 * This is the ActiveQuery class for [[Habilitations]].
 *
 * @see Habilitations
 */
class HabilitationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Habilitations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Habilitations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
