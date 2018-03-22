<?php

use yii\db\Migration;

/**
 * Class m180320_035602_users_update_3
 */
class m180320_035602_users_update_3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameColumn('users', 'login', 'username');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m180320_035602_users_update_3 cannot be reverted.\n";

        $this->renameColumn('users', 'username', 'login');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180320_035602_users_update_3 cannot be reverted.\n";

        return false;
    }
    */
}
