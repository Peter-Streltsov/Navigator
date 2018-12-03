<?php

use yii\db\Migration;

/**
 * Class m180622_014850_magazines
 */
class m180622_014850_magazines extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('magazines', [
            'id' => $this->primaryKey(),
            'magazine' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    } // end function


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('magazines');
        return true;
    } // end function

} // end class
