<?php

namespace app\models\units\monograph;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[MonographiesCitations]].
 *
 * @see MonographiesCitations
 */
class MonographiesCitationsQuery extends ActiveQuery
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
