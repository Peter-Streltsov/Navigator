<?php

use yii\db\Migration;

/**
 * Class m180403_183234_userstatus
 */
class m180403_183234_userstatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('userstatus', [
            'id' => $this->primaryKey(),
            'status' => $this->string()->notNull()
        ]);

        $this->batchInsert('userstatus', ['status'], [
            ['user'],
            ['administrator'],
            ['supervisor']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('userstatus');

        return true;

    } // end function

} // end class
