<?php

use yii\db\Migration;

/**
 * Class m180327_023458_user_roles
 */
class m180327_023458_user_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('user_roles', [
            'id' => $this->primaryKey(),
            'role' => $this->string(100)->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('user_roles');

        return true;

    } // end function

} // end class
