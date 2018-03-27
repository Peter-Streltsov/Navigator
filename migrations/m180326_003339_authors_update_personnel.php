<?php

use yii\db\Migration;

/**
 * Class m180326_003339_authors_update_personnel
 */
class m180326_003339_authors_update_personnel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('authors', 'personnel_id', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('authors', 'personnel_id');

        return true;

    } // end function

} // end class
