<?php

use yii\db\Migration;

/**
 * creates table 'users' (user identity model)
 *
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
            'username' => $this->string(255)->notNull(),
            'password' => $this->string(100)->notNull(),
            'password_hash' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'lastname' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'access_token' => $this->string(255)
        ]);

        $this->batchInsert('users', ['username', 'password', 'name', 'access_token'], [
            ['admin', 'root', 'admin', 'supervisor']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('users');

        return true;

    } // end function

} // end class
