<?php

namespace app\models\units\articles;

/**
 * This is the ActiveQuery class for [[ArticlePages]].
 *
 * @see ArticlePages
 */
class ArticlePagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlePages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlePages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
