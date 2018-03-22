<?php

use yii\db\Migration;

/**
 * Class m180317_003955_users
 */
class m180317_003955_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(255)->notNull(),
            'password' => $this->string(100)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'lastname' => $this->string(255),
            'token' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('users');

        echo "m180317_003955_users reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180317_003955_users cannot be reverted.\n";

        return false;
    }
    */
}
