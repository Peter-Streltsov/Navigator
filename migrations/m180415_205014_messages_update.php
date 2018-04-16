<?php

use yii\db\Migration;

/**
 * Class m180415_205014_messages_update
 */
class m180415_205014_messages_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('messages', 'updated_at', 'integer');

    } // end function

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('messages', 'updated_at');

        return true;

    } // end function

} // end class
