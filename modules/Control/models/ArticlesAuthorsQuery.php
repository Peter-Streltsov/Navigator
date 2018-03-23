<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[ArticlesAuthors]].
 *
 * @see ArticlesAuthors
 */
class ArticlesAuthorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesAuthors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesAuthors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
