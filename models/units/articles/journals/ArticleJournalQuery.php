<?php

namespace app\models\units\articles\journals;

use app\models\units\articles\traits\ArticleQueryTrait;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Article]].
 *
 * @see Article
 */
class ArticleJournalQuery extends ActiveQuery
{

    use ArticleQueryTrait;

    /**
     * @inheritdoc
     * @return ArticleJournal[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return ArticleJournal|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function



    public function byYear($year)
    {

        return $this->where(['year' => $year]);

    } // end function



    public function currentYear()
    {

        return $this->where(['year' => date('Y')]);

    } // end function

} // end class
