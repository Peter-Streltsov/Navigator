<?php

namespace app\modules\Control\models;

/**
 * This is the ActiveQuery class for [[ArticlesCitations]].
 *
 * @see ArticlesCitations
 */
class CitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ArticlesCitations[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ArticlesCitations|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
