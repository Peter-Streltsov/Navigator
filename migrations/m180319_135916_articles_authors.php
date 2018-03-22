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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180319_135916_articles_authors cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180319_135916_articles_authors cannot be reverted.\n";

        return false;
    }
    */
}
