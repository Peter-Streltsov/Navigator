<?php

use yii\db\Migration;

/**
 * Class m180608_115442_articles_associations
 *
 * creates tables for articles associations data (for articles in journals, conferences and collections)
 */
class m180608_115442_articles_associations extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_journals_associations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

        $this->createTable('articles_conferences_associations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

        $this->createTable('articles_collections_associations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles_journals_associations');
        $this->dropTable('articles_conferences_associations');
        $this->dropTable('articles_collections_associations');

        return true;

    } // end function

} // end class
