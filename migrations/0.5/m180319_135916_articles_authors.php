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

        $this->createTable('articles_journals_authors', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'part' => $this->integer()->defaultValue(10)
        ]);

        $this->createTable('articles_conferences_authors', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'part' => $this->integer()->defaultValue(10)
        ]);

        $this->createTable('articles_collections_authors', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'part' => $this->integer()->defaultValue(10)
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('articles_journals_authors');
        $this->dropTable('articles_conferences_authors');
        $this->dropTable('articles_collections_authors');

        return true;

    } // end function

} // end class
