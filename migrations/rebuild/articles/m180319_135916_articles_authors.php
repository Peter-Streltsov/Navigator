<?php

use yii\db\Migration;

/**
 * Class m180319_135916_articles_authors
 */
class m180319_135916_articles_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('articles_authors', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('articles_authors');

        return true;

    } // end function

} // end class
