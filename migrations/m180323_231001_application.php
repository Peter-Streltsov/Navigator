<?php

use yii\db\Migration;

/**
 * Class m180323_231001_application
 */
class m180323_231001_application extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'organisation' => $this->string(255)->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('application');

        return true;

    } // end function

} // end class
