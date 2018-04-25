<?php

use yii\db\Migration;

/**
 * Class m180424_010633_lections
 */
class m180424_010633_lections extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('lections', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'course' => $this->string(),
            'site' => $this->string(),
            'link' => $this->string()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('lections');

        return true;

    } // end function

} // end class
