<?php

use yii\db\Migration;

/**
 * Class m180420_013756_monographies_authors
 */
class m180420_013756_monographies_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('monographies_authors', [
            'id' => $this->primaryKey(),
            'monography_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('monographies_authors');

        return true;

    } // end function

} // end class
