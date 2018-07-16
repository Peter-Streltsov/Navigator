<?php

namespace app\models\units\articles;

/**
 * This is the ActiveQuery class for [[ArticleConferencies]].
 *
 * @see ArticlesConferencies
 */
class ArticleConferenciesQuery extends \yii\db\ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesConferencies[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    }

    /**
     * @inheritdoc
     * @return ArticlesConferencies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
