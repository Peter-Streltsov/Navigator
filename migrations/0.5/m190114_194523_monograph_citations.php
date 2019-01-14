<?php

use yii\db\Migration;

/**
 * Class m190114_194523_monograph_citations
 */
class m190114_194523_monograph_citations extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('monograph_citations', [
            'id' => $this->primaryKey(),
            'monograph_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'class' => $this->string()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('monograph_citations');
        return true;
    } // end function

} // end class
