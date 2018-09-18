<?php

use yii\db\Migration;

/**
 * creates table containing pages interval for exact article
 *
 * Class m180625_150626_article_pages
 */
class m180625_150626_article_pages extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('article_journals_pages', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'begin_page' => $this->integer()->notNull(),
            'end_page' => $this->integer()->defaultValue(null)
        ]);

        $this->createTable('article_conferencies_pages', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'begin_page' => $this->integer()->notNull(),
            'end_page' => $this->integer()->defaultValue(null)
        ]);

        $this->createTable('article_collections_pages', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'begin_page' => $this->integer()->notNull(),
            'end_page' => $this->integer()->defaultValue(null)
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('article_journals_pages');
        $this->dropTable('article_conferencies_pages');
        $this->dropTable('article_collections_pages');

        return true;

    } // end function

} // end class
