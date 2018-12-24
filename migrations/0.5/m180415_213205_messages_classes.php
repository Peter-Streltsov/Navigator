<?php

use yii\db\Migration;

/**
 * Class m180415_213205_messages_classes
 */
class m180415_213205_messages_classes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages_classes', [
            'id' => $this->primaryKey(),
            'class' => $this->string()->notNull()
        ]);

        $this->batchInsert('messages_classes', ['class'], [
            ['Сообщение'],
            ['Запрос на исправление данных']
        ]);
    } // end function


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('messages_classes');
        return true;
    } // end function

} // end class
