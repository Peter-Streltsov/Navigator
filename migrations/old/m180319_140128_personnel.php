<?php

use yii\db\Migration;

/**
 * Class m180319_140128_personnel
 */
class m180319_140128_personnel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('personnel', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'secondname' => $this->string(255)->defaultValue(null),
            'lastname' => $this->string(255)->notNull(),
            'position' => $this->integer()->defaultValue(null),
            'employment' => $this->integer()->defaultValue(null),
            'expirience' => $this->string()->defaultValue(null),
            'age' => $this->integer()->defaultValue(null)

        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('personnel');

        return true;

    } // end function

}
