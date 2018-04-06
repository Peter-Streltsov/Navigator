<?php

use yii\db\Migration;

/**
 * Class m180406_003027_accesstokens
 */
class m180406_003027_accesstokens extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('accesstokens', [
            'id' => $this->primaryKey(),
            'token' => $this->string()->notNull()
        ]);

        $this->batchInsert('accesstokens', ['token'], [
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

        $this->dropTable('accesstokens');

        return true;

    } // end function

} // end class
