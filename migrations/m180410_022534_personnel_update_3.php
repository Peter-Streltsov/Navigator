<?php

use yii\db\Migration;

/**
 * Class m180410_022534_users_update_4
 */
class m180410_022534_personnel_update_3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('personnel', 'user_id', 'integer');
        $this->addForeignKey('fk_staff_users', 'personnel', 'user_id', 'users', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_staff_users', 'personnel');

        $this->dropColumn('personnel', 'user_id');

        return true;
    }

}
