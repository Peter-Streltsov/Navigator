<?php

use yii\db\Migration;

/**
 * Class m180716_201100_articles_conferencies
 */
class m180716_201100_articles_conferences extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('articles_conferences', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'conferency_collection' => $this->text()->notNull(),
            'section' => $this->string(),
            'year' => $this->integer()->notNull(),
            'number' => $this->string(),
            'language' => $this->integer(),
            'annotation' => $this->text(),
            'text_index' => $this->text(),
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
