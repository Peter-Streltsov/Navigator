<?php

use yii\db\Migration;

/**
 * Class m180915_225420_message_classes
 */
class m180915_225420_message_classes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('message_classes', [
            'id' => $this->primaryKey(),
            'class' => $this->string()->notNull()
        ]);

        $this->batchInsert('message_classes', ['class'], [
            ['Сообщение'],
            ['Запрос на исправление личных данных'],
            ['Запрос на исправление данных публикации']
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('message_classes');
        echo "m180915_225420_message_classes reverted.\n";
        return true;
    } // end function

} // end class
