<?php

use yii\db\Migration;

/**
 * Class m180424_004713_editions
 */
class m180424_004713_editions extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('editions', [
            'id' => $this->primaryKey(),
            'chiefeditor' => $this->string(),
            'editor' => $this->string(),
            'volume' => $this->float()
        ]);

    } // end function



    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        $this->dropTable('editions');

        return true;

    } // end function

} // end class
