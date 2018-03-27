<?php

use yii\db\Migration;

/**
 * Class m180325_014951_personnel_update
 */
class m180325_014951_personnel_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('personnel', 'position', 'string');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->alterColumn('personnel', 'position', 'integer');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180325_014951_personnel_update cannot be reverted.\n";

        return false;
    }
    */
}
