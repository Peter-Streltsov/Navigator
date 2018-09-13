<?php

namespace app\models\units\articles\collections;

/**
 * This is the ActiveQuery class for [[ArtcleCollection]].
 *
 * @see ArticleCollection
 */
class ArticleCollectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArtcleCollection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArtcleCollection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
