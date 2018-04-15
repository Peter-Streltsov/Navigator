<?php

use yii\db\Migration;

/**
 * Class m180410_030350_personnel_update_4
 */
class m180410_030350_personnel_remake extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('personnel', 'position', 'string');

        $this->addColumn('personnel', 'year_graduated', 'string');

        $this->addColumn('personnel', 'user_id', 'integer');

        $this->addForeignKey('fk_staff_users', 'personnel', 'user_id', 'users', 'id');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_staff_users', 'personnel');

        $this->dropColumn('personnel', 'year_graduated');
        $this->dropColumn('personnel', 'user_id');
        $this->alterColumn('personnel', 'position', 'integer');

        return true;

    } // end function

} // end class
