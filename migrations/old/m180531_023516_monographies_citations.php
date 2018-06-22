<?php

use yii\db\Migration;

/**
 * Class m180531_023516_monographies_citations
 */
class m180531_023516_monographies_citations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('monographies_citations', [
            'id' => $this->primaryKey(),
            'monography_id' => $this->integer()->notNull(),
            'publisher' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'class' => $this->string()->notNull()
        ]);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('monographies_citations');

        return true;

    } // end function

} // end class
