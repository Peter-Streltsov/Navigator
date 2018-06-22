<?php

use yii\db\Migration;

/**
 * Class m180401_014757_monographies
 */
class m180401_014757_monographies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('monographies', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'subtitle' => $this->string()->defaultValue(null),
            'year' => $this->integer()->notNull(),
            'doi' => $this->string()->defaultValue(null),
            'file' => $this->binary()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('monographies');

        return true;

    } // end function

} // end class
