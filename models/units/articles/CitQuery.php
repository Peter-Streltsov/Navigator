<?php

namespace app\models\units\articles;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticlesCitations]].
 *
 * @see ArticlesCitations
 */
class CitQuery extends ActiveQuery
{

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
