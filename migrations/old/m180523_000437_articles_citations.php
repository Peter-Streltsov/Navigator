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

        $this->createTable('articles_citations', [
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

        $this->dropTable('articles_citations');

        return true;

    } // end function

} // end class
