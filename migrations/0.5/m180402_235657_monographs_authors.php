<?php

use yii\db\Migration;

/**
 * Class m180402_235657_monographs_authors
 */
class m180402_235657_monographs_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('monograph_authors', [
            'id' => $this->primaryKey(),
            'monograph_key' => $this->integer()->notNull(),
            'author_key' => $this->integer()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('monograph_authors');

        return true;

    } // end function

} // end class
