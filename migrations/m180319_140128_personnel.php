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
            'year_graduated' => $this->string(),
            'employment' => $this->integer()->defaultValue(null),
            'expirience' => $this->string()->defaultValue(null),
            'habilitation' => $this->integer(),
            'age' => $this->integer()->defaultValue(null),
            'user_id' => $this->integer()

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
