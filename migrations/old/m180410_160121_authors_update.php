<?php

use yii\db\Migration;

/**
 * Class m180410_160121_authors_update
 */
class m180410_160121_authors_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('authors', 'user_id', 'integer');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('authors', 'user_id');

        return true;

    } // end function

} // end class
