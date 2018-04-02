<?php

use yii\db\Migration;

/**
 * Class m180319_020737_authors
 */
class m180319_020737_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('authors.php', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'secondname' => $this->string(255),
            'lastname' => $this->string(255)->notNull()
        ]);
    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('authors.php');

        return true;
        
    } // end function

} // end class
