<?php

use yii\db\Migration;

/**
 * Class m181006_043712_departments
 */
class m181006_043712_departments extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'department' => $this->string()->notNull()
        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('departments');
        return true;
    }

}
