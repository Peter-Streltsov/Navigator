<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[ArticlesAffilations]].
 *
 * @see ArticlesAffilations
 */
class ArticlesAffilationsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesAffilations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesAffilations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
