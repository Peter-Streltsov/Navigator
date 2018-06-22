<?php

use yii\db\Migration;

/**
 * Class m180319_021020_articles
 */
class m180319_021020_articles extends Migration
{
    /**
     * {@inheritdoc}
     * @return void
     */
    public function safeUp()
    {

        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'subtitle' => $this->string(255),
            'publisher' => $this->string(255),
            'year' => $this->integer()->notNull(),
            'doi' => $this->string(255),
            'file' => $this->binary()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('articles');

        return true;

    } // end function

} // end class
