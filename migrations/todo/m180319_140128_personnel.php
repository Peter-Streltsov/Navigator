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
            'secondname' => $this->string(255),
            'lastname' => $this->string(255)->notNull(),
            'position' => $this->integer()->notNull(),

        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return false;

    } // end function

}
