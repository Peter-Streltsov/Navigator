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

        $this->createTable('authors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'secondname' => $this->string(255),
            'lastname' => $this->string(255)->notNull(),
            'habilitation' => $this->integer(),
            'user_id' => $this->integer(),
            'personnel_id' => $this->integer(),
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('authors');

        return true;
        
    } // end function

} // end class
