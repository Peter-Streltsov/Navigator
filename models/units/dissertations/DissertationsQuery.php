<?php

namespace app\models\units\dissertations;

/**
 * This is the ActiveQuery class for [[Dissertations]].
 *
 * @see Dissertations
 */
class DissertationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Dissertations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Dissertations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
