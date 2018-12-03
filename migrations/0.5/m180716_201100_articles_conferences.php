<?php

use yii\db\Migration;

/**
 * Class m180716_201100_articles_conferencies
 */
class m180716_201100_articles_conferences extends Migration
{
    /**
     * Creating table articles_conferences - basic for ArticlesConferences record
     *
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('articles_conferences', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'conference_collection' => $this->text()->notNull(),
            'section' => $this->string(),
            'year' => $this->integer()->notNull(),
            'number' => $this->string(),
            'type' => $this->integer(),
            'class' => $this->integer()->notNull(),
            'language' => $this->integer(),
            'link' => $this->string(),
            'annotation' => $this->text(),
            'index' => $this->text(),
            'accepted' => $this->integer()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'file' => $this->string()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('articles_conferences');
        return true;
    } // end function

} // end class
