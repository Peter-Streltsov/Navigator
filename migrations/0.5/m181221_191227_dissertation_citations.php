<?php

use yii\db\Migration;

/**
 * Class m181221_191227_dissertation_citations
 */
class m181221_191227_dissertation_citations extends Migration
{

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('dissertations_citations', [
            'id' => $this->primaryKey(),
            'dissertation_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'class' => $this->string()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('dissertations_citations');
        echo "Table 'dissertations_citations' reverted;/n";
        return true;
    } // end function

} // end class
