<?php

use yii\db\Migration;

/**
 * Class m180416_000713_authors_update_2
 */
class m180416_000713_authors_update_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('authors', 'habilitation', 'string');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('authors', 'habilitation');

        return true;

    } // end function

} // end class
