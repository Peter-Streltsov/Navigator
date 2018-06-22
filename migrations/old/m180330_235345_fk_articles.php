<?php

use yii\db\Migration;

/**
 * Class m180330_235345_fk_articles
 */
class m180330_235345_fk_articles extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('articles', 'class', 'integer');

        $this->addForeignKey('fk_articles_indexes', 'articles', ['class'], 'indexes_articles', 'id');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('articles', 'class');

        $this->dropForeignKey('fk_articles_indexes', 'articles');

        return true;

    } // end function

} // end class
