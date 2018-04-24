<?php

use yii\db\Migration;

/**
 * Class m180423_201308_conferencies
 */
class m180423_201308_conferencies extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('conferencies', [
            'id' => $this->primaryKey(),
            'report_title' => $this->string()->notNull(),
            'author' => $this->string()->notNull(),
            'conferencion_name' => $this->string()->notNull(),
            'date' => $this->integer()->notNull(),
            'report_date' => $this->integer(),
            'report_type' => $this->string(),
            'link' => $this->string(),
            'thesis_id' => $this->integer()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('conferencies');

        return true;

    } // end function

} // end class
