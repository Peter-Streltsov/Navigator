<?php

namespace app\models\units\articles;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[ArticlesAffilations]].
 *
 * @see ArticlesAffilations
 */
class ArticlesAffilationsQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return ArticlesAffilations[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return ArticlesAffilations|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
