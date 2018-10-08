<?php

use yii\db\Migration;

/**
 * creates referenced support table for dissertations
 * fills standard data
 *
 * contains dissertation types (field [type] in dissertations)
 *
 * Class m180621_234646_dissertation_types
 */
class m180621_234646_dissertation_types extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('dissertation_types', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
        ]);

        $this->batchInsert('dissertation_types', ['type'], [
            ['автореферат диссертации'],
            ['диссертация']
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('dissertation_types');

        return true;

    } // end function

} // end class
