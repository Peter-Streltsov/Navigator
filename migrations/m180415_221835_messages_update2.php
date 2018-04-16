<?php

use yii\db\Migration;

/**
 * Class m180415_221835_messages_update2
 */
class m180415_221835_messages_update2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('messages', 'read', 'boolean');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('messages', 'read');

        return true;

    } // end function

} // end class
