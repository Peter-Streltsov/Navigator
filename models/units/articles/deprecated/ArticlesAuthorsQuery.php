<?php

namespace app\models\units\articles;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticlesAuthors]].
 *
 * @see ArticlesAuthors
 */
class ArticlesAuthorsQuery extends ActiveQuery
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
