<?php

use yii\db\Migration;

/**
 * Class m180318_235239_users_update_1
 */
class m180318_235239_users_update_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('users', 'created_at', 'int');
        $this->addColumn('users', 'updated_at', 'int');
        $this->addColumn('users', 'auth_key', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('users', 'created_at');
        $this->dropColumn('users', 'updated_at');
        $this->dropColumn('users', 'auth_key');

        return true;

    } // end function


} // end class
