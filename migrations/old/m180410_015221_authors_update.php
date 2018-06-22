<?php

use yii\db\Migration;

/**
 * Class m180410_015221_authors_update
 */
class m180410_015221_authors_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('authors', 'staff_id', 'integer');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('authors', 'staff_id');

        return true;

    } // end function

} // end class
