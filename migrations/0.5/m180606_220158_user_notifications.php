<?php

use yii\db\Migration;

/**
 * Class m180606_220158_user_notifications
 */
class m180606_220158_user_notifications extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('notifications', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'from' => $this->string(),
            'read' => $this->integer()->defaultValue(0)
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('notifications');

        return true;

    } // end function

} // end class
