<?php

use yii\db\Migration;

/**
 * Class m180401_014757_monographs
 */
class m180401_014757_monographs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('monographs', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string()->defaultValue(null),
            'publisher' => $this->string(),
            'type' => $this->integer(),
            'year' => $this->integer()->notNull(),
            'isbn' => $this->string()->defaultValue(null),
            'volume' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'file' => $this->string()
        ]);
    } // end function


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('monographs');
        return true;
    } // end function

} // end class
