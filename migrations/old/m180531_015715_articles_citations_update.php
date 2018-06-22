<?php

use yii\db\Migration;

/**
 * Class m180531_015715_articles_citations_update
 */
class m180531_015715_articles_citations_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('articles_citations', 'publisher', 'string');;

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('articles_citations', 'publisher');

        return true;

    } // end function

} // end class
