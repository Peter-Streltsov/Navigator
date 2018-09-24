<?php

use yii\db\Migration;

/**
 * Class m180608_115442_articles_affilations
 *
 * creates tables for articles affilations data (for articles in journals, conferencies and collections)
 */
class m180608_115442_articles_affilations extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_journals_affilations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

        $this->createTable('articles_conferences_affilations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'article_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull()->defaultValue('other')
        ]);

        $this->createTable('articles_collections_affilations', [
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

        $this->dropTable('articles_journals_affilations');
        $this->dropTable('articles_conferences_affilations');
        $this->dropTable('articles_collections_affilations');

        return true;

    } // end function

} // end class
