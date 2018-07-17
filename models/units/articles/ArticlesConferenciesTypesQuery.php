<?php

namespace app\models\units\articles;

/**
 * This is the ActiveQuery class for [[ArticlesConferenciesTypes]].
 *
 * @see ArticlesConferenciesTypes
 */
class ArticlesConferenciesTypesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesConferenciesTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesConferenciesTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
