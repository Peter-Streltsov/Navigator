<?php

use yii\db\Migration;

/**
 * Class m180330_034027_personnel_update_2
 */
class m180330_034027_personnel_update_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('personnel', 'year_graduated', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('personnel', 'year_graduated');

        return true;

    } // end function

} // end class
