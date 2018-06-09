<?php

use yii\db\Migration;

/**
 * Class m180608_123233_articles_authors_update
 */
class m180608_123233_articles_authors_update extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('articles_authors', 'part', 'float');

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropColumn('articles_authors', 'part');

        return true;

    } // end function

} // end class
