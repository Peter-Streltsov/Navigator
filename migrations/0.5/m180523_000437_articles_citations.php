<?php

use yii\db\Migration;

/**
 * Class m180523_000437_articles_citations
 */
class m180523_000437_articles_citations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_journals_citations', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'class' => $this->string()
        ]);

        $this->createTable('articles_conferences_citations', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'class' => $this->string()
        ]);

        $this->createTable('articles_collections_citations', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'class' => $this->string()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('articles_journals_citations');
        $this->dropTable('articles_conferences_citations');
        $this->dropTable('articles_collections_citations');

        return true;

    } // end function

} // end class
