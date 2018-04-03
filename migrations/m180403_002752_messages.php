<?php

use yii\db\Migration;

/**
 * Class m180403_002752_messages
 */
class m180403_002752_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'username' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'category' => $this->string()->notNull(),
            'custom_theme' => $this->string(255),
            'text' => $this->text()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('messages');

        return true;

    } // end function

}
