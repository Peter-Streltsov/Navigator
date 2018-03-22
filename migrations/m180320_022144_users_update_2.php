<?php

use yii\db\Migration;

/**
 * Class m180320_022144_users_update_2
 */
class m180320_022144_users_update_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->renameColumn('users', 'token', 'access_token');

    } // end function

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->renameColumn('user', 'access_token', 'token');

        return true;

    } // end function


} // end class
